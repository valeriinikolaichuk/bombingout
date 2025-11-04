const dialog = document.getElementById('nomin_add');
function showNominDialog(){
    dialog.showModal();
}

function closeNominDialog(){
    dialog.close();
}

dialog.addEventListener('input', () => {
    let squat = document.getElementById('squat').value;
    let bench = document.getElementById('benchPress').value;
    let lift = document.getElementById('deadLift').value;
    let squatNumber = Number(squat);
    let benchNumber = Number(bench);
    let liftNumber = Number(lift);
    let sum = squatNumber + benchNumber + liftNumber;
    
    document.getElementById('total').value = sum;
});

const formAddAthlete = document.getElementById('formAddAthlete');
const requiredFields = [
    { el: document.getElementById('surnameName'), name: 'Surname & Name' },
    { el: document.getElementById('dateOfBirth'), name: 'Date of Birth' },
    { el: document.getElementById('weightCategory'), name: 'Weight Category' },
    { el: document.getElementById('region'), name: 'Region' },
    { el: document.getElementById('city'), name: 'City' },
    { el: document.getElementById('squat'), name: 'Squat' },
    { el: document.getElementById('benchPress'), name: 'Bench Press' },
    { el: document.getElementById('deadLift'), name: 'Dead Lift' }
];

formAddAthlete.addEventListener('submit', async (event) => {
    event.preventDefault();

    for (let field of requiredFields) {
        const value = field.el.type === 'date' ? field.el.valueAsDate : field.el.value.trim();
        if (!value) {
            alert(`All fields marked * must be completed (${field.name})`);
            return;
        }
    }

    const formData = new FormData(formAddAthlete);
    const response = await fetch("assets/models_js/addAthleteToNomination_json.php", {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(Object.fromEntries(formData))
    });

    const result = await response.json();
console.log(result);
    if (result.success) {
        alert(result.message);
        formAddAthlete.reset();
        closeNominDialog();
    }
});