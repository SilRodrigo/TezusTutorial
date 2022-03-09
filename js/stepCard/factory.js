import StepCard from "./model";

export default class StepCardFactory {

    renderStepsCard(target, steps) {
        steps.forEach(step => { target.append(new StepCard(step).stepElem) });
    }

    generateStepCard(){
        return new StepCard();
    }

}