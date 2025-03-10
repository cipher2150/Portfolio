document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();
    const gender = document.querySelector('input[name="gender"]:checked');
    const newsletter = document.getElementById("newsletter").checked;
    const status = document.getElementById("status");

    // Name Validation
    if (name === "" || !/^[a-zA-Z\s]+$/.test(name)) {
        status.style.color = "red";
        status.textContent = "Please enter a valid name (letters and spaces only).";
        return;
    }

    // Email Validation
    if (email === "" || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        status.style.color = "red";
        status.textContent = "Please enter a valid email address.";
        return;
    }

    // Message Validation
    if (message.length < 10) {
        status.style.color = "red";
        status.textContent = "Message must be at least 10 characters long.";
        return;
    }

    // Gender Validation
    if (!gender) {
        status.style.color = "red";
        status.textContent = "Please select your gender.";
        return;
    }

    // Newsletter Validation 
    if (!newsletter) {
        status.style.color = "orange";
        status.textContent = "You have not subscribed to the newsletter. Consider subscribing!";
    } else {
        status.style.color = "green";
        status.textContent = "Thank you for subscribing to the newsletter!";
    }

    // Success Message
    status.style.color = "green";
    status.textContent = "Message sent successfully!";
    document.getElementById("contactForm").reset();
});
