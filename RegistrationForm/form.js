const checkbox = document.getElementById('optionalCheckbox');
const fieldset = document.getElementById('optionalFieldset');

function optionalChange() {
    if (checkbox.checked)
        fieldset.hidden = false;
    else
        fieldset.hidden = true;
}
optionalChange();

checkbox.addEventListener('click', (e) => {
    optionalChange();
});