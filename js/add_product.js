var prev_form = 0;

function update_form(value){
    set_visible(prev_form, 'none');
    set_visible(value, 'block');
    prev_form = value;
}

function set_visible(form_id, display){
    let form = document.getElementById(form_id.toString());

    if (form === null)
        return;

    form.style.display = display;
    let fields = form.querySelectorAll(".field");

    for (let i = 0; i < fields.length; i++){
        if (display === 'none')
            fields[i].removeAttribute("required");
        else
            fields[i].setAttribute("required", "required");
    }
}

function validate(form_name) {
    let arr = ["price", "size", "weight", "height", "width", "length"];

    for (let i = 0; i < arr.length; i++){
        if (!chk_positive(document.forms[form_name][arr[i]]))
            return false;
    }

    return true;
}

function chk_positive(field){
    let value = field.value;

    if (value === "")
        return true;
    else
        if (value < 0) {
            alert("This field must be a positive value!");
            field.focus();
            return false;
        }

    return true;
}