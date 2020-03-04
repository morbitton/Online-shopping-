<main>
    <div id="mainWrraper">

        <p id="error"></p>

        <?php echo form_open('Login_controller/insertData'); ?>
        <fieldset>
            <legend>Registration:</legend>
            <div>
            <h6>Registration instructions</h3>
            <p>○ Username must contain letters and numbers.<br>
            ○ Username must contain at least 8 characters.<br>
            ○ The password must contain letters and numbers.<br>
            ○ Password must contain at least 8 characters, number and special chars</p>
            </div>
            <div class="inputWrapper"><label>First name: </label><input id="First_name" class="formInput" type="text" name="First_name"></div>
            <div class="inputWrapper"><label>Last name: </label><input id="Last_name" class="formInput" type="text" name="Last_name"></div>
            <div class="inputWrapper"><label>Email: </label><input id="Email" class="formInput" type="text" name="Email"></div>
            <div class="inputWrapper"><label>Username: </label><input id="User_name" class="formInput" type="text" name="User_name"></div>
            <div class="inputWrapper"><label>Password: </label><input id="Password" class="formInput" type="password" name="Password"></div>
            <div class="inputWrapper"><label>Confirm Password: </label><input id="Confirm_password" class="formInput" type="password" name="Confirm_password"></div>
            <div class="inputWrapper"><label>Age: </label><input id="Age" class="formInput" type="number" name="Age"></div>

            <div class="inputWrapper"><label> Location:</label><select id="Location" name="Location">
                    <option value="Central">Central</option>
                    <option value="South">South</option>
                    <option value="North">North</option>
                </select></div>
            <div class="inputWrapper"><input id="register" type="button" value="register" name="submit">
                </fieldset>

                </form>

            </div>
            </main>

            <script>
                $("#register").click(function () {
                    var First_name = $("#First_name").val();
                    var Last_name = $("#Last_name").val();
                    var Email = $("#Email").val();
                    var User_name = $("#User_name").val();
                    var Password = $("#Password").val();
                    var Confirm_password = $("#Confirm_password").val();
                    var Age = $("#Age").val();
                    var Location = $("#Location").val();

                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url(); ?>" + "/Login_controller/insertData",
                        data: {
                            First_name: First_name,
                            Last_name: Last_name,
                            Email: Email,
                            User_name: User_name,
                            Password: Password,
                            Confirm_password: Confirm_password,
                            Age: Age,
                            Location: Location
                        },
                        error: function () {
                            alert('Something is wrong');
                        },
                        success: function (data) {
                            if (data === "1") {
                                alert("Registration succedded");
                                window.location.href = "<?php echo site_url('Login_controller/login'); ?>";
                            } else {
                                $("#error").html(data);
                            }
                        }
                    });
                });

            </script>
