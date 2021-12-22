// SETTING THE VARIABLES TO ALL HTML-ELEMENTS
const saveBtn = document.getElementById('save-btn')
const updateBtn = document.getElementById('update-btn')
const deleteBtn = document.getElementById('delete-btn')

let resultText = document.getElementById('resultText')
let resultInfo = document.getElementById('resultInfo')
let dateInput = document.getElementById("date")
let imgContainer = document.getElementById('imgContainer')
let img = document.getElementById('horoImg');



//EVENT-LISTENERS TO TRIGGER FUNCTIONS
updateBtn.addEventListener('click', updateHoroscope)
saveBtn.addEventListener('click', sendHoroscope)
deleteBtn.addEventListener('click', deleteHoroscope)
window.addEventListener('load', initSite)

// FUNCTIONS

async function initSite() {
    await renderHoroscope();
    await renderHoroscopeImg();

    if (img.getAttribute('src') != '') {
        showButtons();
        hideSaveBtn();
    }

}

// DECLARE THE "CREATE OBJECT FUNC" VARIABLES TO BE ACCESSED ANYWHERE"

let dateObject;
let date;
let stringDate;

function createObject() {
    dateObject = new Date(dateInput.value)
    date = {
        month: dateObject.getMonth(dateInput) + 1,
        day: dateObject.getDate(dateInput)
    }
    stringDate = JSON.stringify(date);
}

// TOGGLE BUTTONS FUNCTIONS

function showButtons() {

    updateBtn.style.display = 'flex';
    deleteBtn.style.display = 'flex';
}

function hideButtons() {

    updateBtn.style.display = 'none';
    deleteBtn.style.display = 'none';
}

function hideSaveBtn() {

    saveBtn.style.display = 'none';
}

// HOROSCOPE FUNCTIONS


async function sendHoroscope() {

    if (dateInput.value == 0) {
        dateInput.style.borderColor = 'red';
        dateInput.style.color = 'red';
        resultInfo.innerText = 'Ange ett giltigt datum!'
        return

    } else {

        createObject();
        showButtons()
        hideSaveBtn()

        dateInput.style.borderColor = 'blue';
        dateInput.style.color = 'blue';

        let url = "./server/addHoroscope.php"
        let method = 'POST'
        let formData = new FormData()
        formData.set('date', stringDate);

        let result = await makeRequest(url, method, formData)
        if (result == true) {
            await renderHoroscope();
            await renderHoroscopeImg();
            console.log(result);
        }
    }

}


async function renderHoroscope() {
    let url = "./server/viewHoroscope.php"
    let method = 'GET'
    let result = await makeRequest(url, method, undefined)
    if (result) {
        resultInfo.innerText = 'Ditt stjärntecken är...'
        resultText.innerText = result;
        console.log(result);

    } else {
        console.log(result);
    }

}



async function renderHoroscopeImg() {
    let url = "./server/viewHoroImg.php"
    let method = 'GET'
    let result = await makeRequest(url, method, undefined)
    if (result) {
        let imgUrl = '/img/'
        img.src = imgUrl + result;
        imgContainer.style.display = 'flex';

    } else {
        console.log(result);
    }

}




async function deleteHoroscope() {
    let url = "./server/deleteHoroscope.php"
    let method = 'DELETE'
    let formData = new FormData()
    formData.set('date', 0);
    let result = await makeRequest(url, method, formData)
    if (result) {
        hideButtons();
        imgContainer.style.display = 'none';
        saveBtn.style.display = 'flex';
        resultInfo.innerText = 'Stjärntecken raderat!';
        resultText.innerText = '';
        console.log(result);


    } else {
        console.log(result);
    }

}


async function updateHoroscope() {
    createObject();
    let url = "./server/updateHoroscope.php"
    let method = 'POST'
    let formData = new FormData()
    formData.set('date', stringDate);

    let result = await makeRequest(url, method, formData)
    if (result == true) {
        await renderHoroscope();
        await renderHoroscopeImg();
        console.log(result);
    } else {
        console.log(result);
    }

}


async function makeRequest(url, method, formData) {
    try {
        let response = await fetch(url, {
            method,
            body: formData
        })
        let result = await response.json()
        return result;

    } catch (err) {
        console.error(err);
    }
}

