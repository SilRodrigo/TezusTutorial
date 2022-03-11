import StepCard from "./model.js";

export default class StepCardFactory {

    renderStepsCard(target, steps) {
        let stepCards = [];
        steps.forEach(step => {
            let stepCard = new StepCard(step);
            stepCards.push(stepCard);
            target.append(stepCard.stepElem);
        });
        return stepCards;
    }

    generateStepCard(step) {
        return new StepCard(step);
    }

}