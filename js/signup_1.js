var check = function() {
    if ((document.getElementById('pass_customer').value == "") 
    || (document.getElementById('confirm_pass_customer').value == "")) {
        document.getElementById('confirm_pass_message').textContent = '';
        document.getElementById('submit_signup_1').disabled = true;

    }else if (document.getElementById('pass_customer').value == document.getElementById('confirm_pass_customer').value) {
        document.getElementById('confirm_pass_message').style.color = 'green';
        document.getElementById('confirm_pass_message').textContent = 'terkonfirmasi';
        document.getElementById('submit_signup_1').disabled = false;
    } else {
        document.getElementById('confirm_pass_message').style.color = 'red';
        document.getElementById('confirm_pass_message').textContent = 'password tidak sama';
        document.getElementById('submit_signup_1').disabled = true;
    }
  }