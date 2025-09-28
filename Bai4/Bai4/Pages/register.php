<div class="content-register">
    <h2>Đăng Ký</h2>
    <form method="post" action="index.php?page=registerprocess">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label>Gender:</label>
        <div class="form-inline">
            <input type="radio" id="male" name="gender" value="Male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female" required>
            <label for="female">Female</label>
        </div>

        <label for="address">Address:</label>
        <select id="address" name="address" required>
            <option value="Hanoi">Hà Nội</option>
            <option value="HCM">Bắc Ninh</option>
            <option value="Hue">Thái Nguyên</option>
            <option value="Danang">Hạ Long</option>
        </select>

        <label>Enable Programming Language:</label>
        <div class="form-inline">
            <input type="checkbox" id="php" name="programming_language[]" value="PHP">
            <label for="php">PHP</label>
            <input type="checkbox" id="csharp" name="programming_language[]" value="C#">
            <label for="csharp">C#</label>
            <input type="checkbox" id="java" name="programming_language[]" value="Java">
            <label for="java">Java</label>
            <input type="checkbox" id="cplusplus" name="programming_language[]" value="C++">
            <label for="cplusplus">C++</label>
        </div>

        <label for="skill">Skill:</label>
        <select id="skill" name="skill" required>
            <option value="Normal">Normal</option>
            <option value="Good">Good</option>
            <option value="VeryGood">Very Good</option>
            <option value="Excellent">Excellent</option>
        </select>

        <label for="marriage">Marriage Status:</label>
        <input type="checkbox" id="marriage" name="marriage_status" value="Married">
        <label for="marriage">Married</label>

        <label for="note">Note:</label>
        <textarea id="note" name="note" rows="4" cols="50"></textarea>

        <div class="button-group">
            <input type="reset" name="reset" value="Reset">
            <input type="submit" name="register" value="Register">
        </div>
    </form>
</div>
