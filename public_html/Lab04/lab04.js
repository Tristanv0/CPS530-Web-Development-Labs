function validate() {
    event.preventDefault();
    const fullName = document.getElementById("fullName").value;
    const address = document.getElementById("address").value;
    const phoneNumber = document.getElementById("phoneNumber").value;
    const nameRegex = /^[A-Za-z\s]+$/
    const phoneRegex = /^\(\d{3}\) \d{3}-\d{4}$/

    if (!fullName.match(nameRegex) && !phoneNumber.match(phoneRegex)) {
        alert("Your name can only contain letters and spaces!\n\nYour phone number must follow the format (xxx) xxx-xxxx, where x are only digits!")
    }
    else if (!fullName.match(nameRegex)) {
        alert("Your name can only contain letters and spaces!")
        return
    } else if (!phoneNumber.match(phoneRegex)) {
        alert("Your phone number must follow the format (xxx) xxx-xxxx, where x are only digits!")
        return
    } else {
        let reformatPN = phoneNumber.replace(/\((\d{3})\)/, "$1").replace(" ", "-");
        displayOutput(fullName, address, reformatPN);
    }
}

function displayOutput(fullName, address, reformatPN) {
    const outputDiv = document.getElementById("output1");
    outputDiv.style.display = "block";
    outputDiv.innerHTML = `
        <h3>Form Information</h3>
        <p><strong>Full Name:</strong> ${fullName}</p>
        <p><strong>Address:</strong> ${address}</p>
        <p><strong>Phone Number:</strong> ${reformatPN}</p>
    `;
}

function charCounter() {
    var text = document.getElementById("inputText").value;
    var charCount = document.getElementById("charCount");

    charCount.innerHTML = text.length;
}

function letterCounter() {
    var text = document.getElementById("inputText").value;
    var letterCount = document.getElementById("letterCount");
    var lettersCount = text.replace(/[^A-Za-z]/g, "").length //filters text to only show letters and gets the length

    letterCount.innerHTML = lettersCount;
}

function bookmarks() {
    const links = ["https://courses.torontomu.ca/d2l/home" , "http://icio.us/"];
    const saferegex = /^https:.*/;
    const unsaferegex = /^http:.*/;
    let bookmarkList = "<br>";

    for (let i = 0; i<links.length; i++) {
        if (!links[i].match(saferegex)) {
            bookmarkList += `<span class="safe">🔓</span><a class="link" href="${links[i]}">${links[i]}</a><br>`;
        } else if (!links[i].match(unsaferegex)) {
            bookmarkList += `<span class="unsafe">🔒</span><a class="link" href="${links[i]}">${links[i]}</a><br>`;
        }
    }
    bookmarkListResult.innerHTML = bookmarkList;


}