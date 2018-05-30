/**
 * custom postprocessing step computes support, lift and conviction for all rules
 */
if (msg.payload && msg.payload.associationRules) {

var fs = msg.payload.frequentItemSets;
var ar = msg.payload.associationRules;

for (var ass of ar) {
    for (var item of fs[ass.lhs.length]) {
        if (ass.lhs.every(function(e){ return item.itemSet.indexOf(e) !== -1;})) {
            ass.support = item.support;
        }
        if (ass.rhs.every(function(e){ return item.itemSet.indexOf(e) !== -1;})) {
            ass.supportY = item.support;
        }
    }
    if (ass.support && ass.supportY) {
        ass.lift = ass.confidence / (ass.support * ass.support * ass.supportY);
        ass.conviction = (1 - ass.supportY) / (1 - ass.confidence);
        if (ass.confidence === 1) ass.conviction = 'inf';
    }
}
msg.payload = ar;
    return [{payload: "Showing data..."}, msg];
} else {
    return [{payload: "Data cleared"}, {payload: []}];
}

