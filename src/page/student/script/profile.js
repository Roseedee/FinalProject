let add_skill = document.getElementById("add-skill");
let add_interested = document.getElementById("add-interested");

//add event for skill
add_skill.onclick = DisplayForm_skill;
document.getElementById("cancel-add-skill").onclick = HidenForm_skill;

//add event for interested
add_interested.onclick = DisplayForm_interested;
document.getElementById("cancel-add-interested").onclick = HidenForm_interested;

//get DOM form skill form and interested form
let form_skill = document.getElementById("form-add-selection-skill").style;
let form_interested = document.getElementById("form-add-selection-interested").style;

function DisplayForm_skill() {
    form_skill.display = "flex";
    add_skill.style.display = "none";
}

function HidenForm_skill() {
    form_skill.display = "none";
    add_skill.style.display = "block";
}

function DisplayForm_interested() {
    form_interested.display = "flex";
    add_interested.style.display = "none";
}

function HidenForm_interested() {
    form_interested.display = "none";
    add_interested.style.display = "block";
}
