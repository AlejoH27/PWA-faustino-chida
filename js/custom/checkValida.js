document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('roles').addEventListener('click', function (event) {
        const clickedElement = event.target;
        if (clickedElement.classList.contains('rolCheckbox')) {
            const checkboxId = clickedElement.id;
            const checkboxValue = clickedElement.value;
            const isChecked = clickedElement.checked;

            const containerId = `rolContainer_${checkboxValue}`;
            const container = document.querySelector(`.${containerId}`);

            if (container) {
                if (isChecked) {
                    console.log(`${checkboxValue}: con valor: ${checkboxValue} y está marcado`);
                    container.style.display = 'block';
                } else {
                    console.log(`${checkboxValue}: con valor: ${checkboxValue} y está desmarcado`);
                    container.style.display = 'none';
                }
            }
        }
    });
});
