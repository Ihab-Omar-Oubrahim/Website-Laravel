// Home lending elements //

const checkbox = document.getElementById("checkbox-LD");
const checkbox2 = document.getElementById("checkbox-LD2");
const slider = document.getElementById('slider-con');
const footer = document.getElementById('Footer');
const f3_form = document.getElementById('F3-Form');
const sub_input = document.getElementById('sub-email');

// profile elements //

const profile_bg = document.getElementById("profile-section");



function toggleTheme() {
    document.body.classList.toggle('light');

    if (document.body.classList.contains('light')) {
        // Change to light mode
        document.body.style.setProperty('--Default-color', 'black');
        slider.style.background = 'linear-gradient(135deg, rgba(248, 249, 250, 0.8), rgba(224, 234, 252, 0.8))';
        footer.style.background = 'linear-gradient(135deg, rgba(248, 249, 250, 0.8), rgba(224, 234, 252, 0.8))';
        f3_form.style.background = "#dad1d1b0"
        sub_input.style.background = "transparent";
        sub_input.style.color = "#000000";

        // profile section //
        profile_bg.style.background = "#e4e4e4"

    } else {
        // Change back to default mode
        document.body.style.setProperty('--Default-color', 'white');
        slider.style.background = '#3d3d3c59';
        footer.style.background = 'rgba(44, 44, 44, 0.473)';
        f3_form.style.background = "#16161656"
        sub_input.style.background = "rgba(39, 39, 39, 0.493)";
        sub_input.style.color = "rgb(153, 153, 26)";

        // profile section //
        profile_bg.style.background = "#222020"


    }

    // Synchronize both checkboxes
    checkbox.checked = checkbox2.checked = document.body.classList.contains('light');
}

// Listen to changes on both checkboxes
checkbox.addEventListener('change', toggleTheme);
checkbox2.addEventListener('change', toggleTheme);
