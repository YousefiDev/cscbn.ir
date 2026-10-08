// Two transports with the same API: Socket.IO (online) and an in-browser server core (offline practice).
export async function connectOnline(onStatus) {
  if (!window.io) throw new Error('socket.io client missing');
  const s = window.io({ transports: ['websocket', 'polling'], reconnection: true, reconnectionDelay: 800, timeout: 8000 });
  s.on('disconnect', () => onStatus && onStatus('bad', 'اتصال قطع شد؛ تلاش دوباره…'));
  s.on('connect', () => onStatus && onStatus('ok', 'متصل به سرور'));
  await new Promise((res, rej) => { const t = setTimeout(() => rej(new Error('timeout')), 9000); s.once('connect', () => { clearTimeout(t); res(); }); s.once('connect_error', (e) => { if (!s.connected) { /* keep trying */ } }); });
  return { get id() { return s.id; }, offline: false, emit(ev, d, ack) { if (ack) s.emit(ev, d, ack); else s.emit(ev, d); }, on(ev, f) { s.on(ev, f); }, off(ev, f) { s.off(ev, f); }, close() { s.disconnect(); }, connected: () => s.connected, raw: s };
}
export async function connectOffline() {
  const { ServerCore } = await import('/shared/core.js');
  const core = new ServerCore(), handlers = {}, queue = []; let scheduled = false;
  const flush = () => { scheduled = false; const q = queue.splice(0); for (const [ev, d] of q) { const l = handlers[ev]; if (l) for (const f of l.slice()) f(d); } };
  const deliver = (ev, d) => { queue.push([ev, d]); if (!scheduled) { scheduled = true; queueMicrotask(flush); } };
  const id = 'local';
  const c = core.connect(id, (ev, d) => deliver(ev, structuredClone(d)), { offline: true });
  const timer = setInterval(() => core.tick(), 50);
  return {
    id, offline: true, core,
    emit(ev, d, ack) { c.handle(ev, d === undefined ? d : structuredClone(d), ack ? (r) => { queue.push(['__ack', () => ack(r)]); if (!scheduled) { scheduled = true; queueMicrotask(flush); } } : undefined); },
    on(ev, f) { (handlers[ev] = handlers[ev] || []).push(f); }, off(ev, f) { handlers[ev] = (handlers[ev] || []).filter((x) => x !== f); },
    close() { clearInterval(timer); c.close(); }, connected: () => true,
    _init() { this.on('__ack', (fn) => fn()); return this; },
  }._init();
}
