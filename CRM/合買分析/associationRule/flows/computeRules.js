var data = msg.payload;

var Apriori = context.global.apriori;

var Alg = new Apriori.Algorithm(0.15, 0.6, false);
var transactions = Apriori.ArrayUtils.readCSVToArray(data, ',');
node.warn(transactions);
binomialToNominal(transactions);
transactions.shift().shift();
node.warn(transactions);
var analysisResult = Alg.analyze(transactions);

//var result = JSON.stringify(analysisResult.associationRules);


//msg.payload = analysisResult.associationRules;
msg.payload = analysisResult;
return msg;

function binomialToNominal(trans) {
    for (var i = 1; i < trans.length; i++) {
        for (var j = 0; j < trans[i].length; j++) {
            if (trans[i][j] === "false") {
                trans[i][j] = "Not_" + trans[0][j];
            } else if (trans[i][j] === "true") {
                trans[i][j] = trans[0][j];
            } else {
                trans[i][j] = trans[0][j] + '_' + trans[i][j];
            }
        }
    }
    return trans;
}
