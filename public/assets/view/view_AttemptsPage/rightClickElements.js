ViewAttemptsPage.prototype.rightClickElement = function(){
    this.idGoodLiftEl = document.getElementById("id_goodLift");
    this.attemptGoodLiftEl = document.getElementById("attempt_goodLift");
    this.goodLiftWeightEl = document.getElementById("goodLift_weight");
    this.attemptColorGoodEl = document.getElementById("attemptColorGood");
    this.categoryGoodLiftEl = document.getElementById("categoryGoodLift");

    this.idNoLiftEl = document.getElementById("id_noLift");
    this.attemptNoLiftEl = document.getElementById("attempt_noLift");
    this.noLiftWeightEl = document.getElementById("noLift_weight");
    this.attemptColorNoEl = document.getElementById("attemptColorNo");
    this.categoryNoLiftEl = document.getElementById("categoryNoLift");

    this.idCancelEl = document.getElementById("id_cancel");
    this.attemptCancelEl = document.getElementById("attempt_cancel");
    this.cancelAttWeightEl = document.getElementById("cancelAtt_weight");
    this.attemptColorEl = document.getElementById("attemptColor");
    this.categoryCanAttEl = document.getElementById("categoryCanAtt");
}

ViewAttemptsPage.prototype.rightClickClasses = function(){
    this.rightClickToolbar = document.getElementById("right_click");
    this.rightClickToolbarCancel = document.getElementById("right_click_cancel");
}

ViewAttemptsPage.prototype.getElement = function(valOne, valTwo){
    return document.getElementById(valOne+valTwo);
}