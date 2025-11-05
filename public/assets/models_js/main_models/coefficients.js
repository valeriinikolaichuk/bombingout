function wilksFormula(bodyweight){
    if (bodyweight <= 0){
        return null;
    } else {
        let a, b, c, d, f;
        let wilks;
        let wilksString;

        if (compVersion == 'IBSA'){
            if (compSex == 'men'){
                a = -216.0475144;
                b = 16.2606339;
                c = -0.002388645;
                d = -0.00113732;
                e = 7.01863 / 1000000;
                f = -1.291 / 100000000;
            } else {
                a = 594.31747775582;
                b = -27.23842536447;
                c = 0.82112226871;
                d = -0.00930733913;
                e = 0.00004731582;
                f = -0.00000009054;
            }

            wilks = 500 / (a + b * bodyweight + c * bodyweight*bodyweight + d * bodyweight*bodyweight*bodyweight + e * bodyweight*bodyweight*bodyweight*bodyweight + f * bodyweight*bodyweight*bodyweight*bodyweight*bodyweight);
            // 500 / (a + bx + cx2 + dx3 + ex4 + fx5)
            wilks = Math.round(wilks * 10000) / 10000;
        }

        if (wilks <= 0){
            wilks = null;
        }

        return wilks;
    }
}