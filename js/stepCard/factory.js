export default class StepCardFactory {

    renderStepsCard(target, steps) {
        steps.forEach(step => { target.append(new StepCard(step).finalElem) });
    }

}