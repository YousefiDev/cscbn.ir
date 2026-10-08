export const VIP_TIERS = {
  1: { name: 'VIP', color: '#f5c451', weapons: ['deagle','p90','awp'], discount: 0.35, startMoney: 20000, perks: ['vip_chat','vip_guns'] },
  2: { name: 'VIP+', color: '#8bd5ff', weapons: ['deagle','p90','awp','m4a1s','sg553','aug'], discount: 0.55, startMoney: 22000, perks: ['vip_chat','vip_guns','colored_smoke','extra_nades'] },
  3: { name: 'VIP MAX', color: '#ff7de9', weapons: ['deagle','p90','awp','m4a1s','sg553','aug','galil','famas'], discount: 0.75, startMoney: 25000, perks: ['vip_chat','vip_guns','colored_smoke','extra_nades','priority'] }
};
export const VIP_WEAPON_SET = new Set(Object.values(VIP_TIERS).flatMap(x => x.weapons));
export const vipTier = (n) => Math.max(0, Math.min(3, Number(n) || 0));
export const RANKS = [
  {name:'Recruit', tag:'R1', xp:0}, {name:'Private',tag:'R2',xp:250}, {name:'Private II',tag:'R3',xp:600},
  {name:'Corporal',tag:'R4',xp:1100}, {name:'Sergeant',tag:'R5',xp:1800}, {name:'Sergeant II',tag:'R6',xp:2800},
  {name:'Lieutenant',tag:'R7',xp:4200}, {name:'Captain',tag:'R8',xp:6200}, {name:'Major',tag:'R9',xp:9000},
  {name:'Colonel',tag:'R10',xp:12500}, {name:'General',tag:'R11',xp:17000}, {name:'Elite',tag:'R12',xp:23000}
];
export const rankForXp = (xp=0) => { let r=RANKS[0]; for(const x of RANKS) if(Number(xp)>=x.xp) r=x; else break; return r; };
export const rankIndex = (xp=0) => Math.max(0, RANKS.findIndex(x => x === rankForXp(xp)));
export const VIP_COSMETICS = {
  1: { chat:['gold'], smoke:['gold'], knives:['default'], gloves:['default'], agents:['default'], mvps:['classic'] },
  2: { chat:['gold','cyan'], smoke:['gold','cyan','purple'], knives:['default','ruby'], gloves:['default','carbon'], agents:['default','urban'], mvps:['classic','neon'] },
  3: { chat:['gold','cyan','pink','green'], smoke:['gold','cyan','purple','red'], knives:['default','ruby','sapphire','emerald'], gloves:['default','carbon','royal'], agents:['default','urban','elite'], mvps:['classic','neon','inferno','victory'] }
};
