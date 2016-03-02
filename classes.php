


    <div data-role="content">

        <form action="" method="post">
            
            <div data-role="fieldcontain">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div data-role="fieldcontain">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div data-role="fieldcontain">
                <label for="password2">Confirm Password:</label>
                <input type="password" name="password2" id="password2" required>
            </div>
            <div data-role="fieldcontain">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div data-role="fieldcontain">
                <label for="identity">I am a:</label>
                <select id="identity" name="identity">
                    <option value="NULL">Select One</option>
                    <option>Fan</option>
                    <option>Artist</option>
                    <option>Band</option>
                    <option>Venue</option>
                    <option>Store/Company</option>
                </select>
            </div>
            <div data-role="fieldcontain">
                <label for="fullname">Full Name:</label>
                <input type="text" name="fullname" id="fullname">
            </div>
            <div data-role="fieldcontain">
                <label for="gender">Gender:</label>
                <select id="gender" name="gener">
                    <option value="NULL">Select One</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>

            <div data-role="fieldcontain">
                <label for="favmusic">Favorite Music:</label>
                <select id="favmusic" name="favmusic">
                    <option value="NULL">Select One</option>
                    <option>Pop</option>
                    <option>Classical</option>
                    <option>Rock&Roll</option>
                    <option>Country</option>
                    <option>Jazz</option>
                    <option>Blues</option>
                    <option>Others</option>
                </select>
            </div>

            <input type="submit" onclick="signup()" value="Register">

        </form>

    </div>
