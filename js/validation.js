const validation = new JustValidate("#signup");

validation
    .addField("#userName", [
        {
            rule: "required"
        },
        {
            validator: (value) => () => {
                return fetch("validate_name.php?userName=" + encodeURIComponent(value))
                .then(function(response) {
                    return response.json();
                })
                .then(function(json) {
                    return json.available;
                });
            },
            errorMessage: "Username already taken"
        }
    ])
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#password_confirm", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            message: "Passwords should match"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });