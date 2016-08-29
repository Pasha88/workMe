This is start registration form: <br/>

<form name="registrationForm" id="registrationForm" action="index.php?page=member&action=register" method="post">

	<label for="Firstname"> Firstname </label>
	<input type="text" name="Firstname" id="Firstname" required /> <br />
	
	<label for="LastName"> LastName </label>
	<input type="text" name="LastName" id="LastName" required/> <br />
	
		
	<label for="username"> username</label>
	<input type="text" name="username" id="username" required/> <br />

    <label for="job1"> job1 </label>
    <select name="job1" id="job1" required>
        <option value="taxi">taxi driver</option>
        <option value="compmaster">Comp master</option>
        <option value="homemaster">Home master</option>
        <option value="tutor">Tutor</option>
    </select>

    <label for="job2"> job2 </label>
    <select name="job2" id="job2" required>
        <option value="taxi">taxi driver</option>
        <option value="compmaster">Comp master</option>
        <option value="homemaster">Home master</option>
        <option value="tutor">Tutor</option>
        <option value="none">None</option>
    </select>


    <label for="job3"> job3 </label>
    <select name="job3" id="job3" required>
        <option value="taxi">taxi driver</option>
        <option value="compmaster">Comp master</option>
        <option value="homemaster">Home master</option>
        <option value="none">None</option>
    </select>

    <label for="subway"> subway </label>
    <select name="subway" id="subway" required>

        <option value="devyatkino"> Девяткино</option>
        <option value="grajdanskii"> Гражданский проспект</option>
        <option value="akademka"> Академическая</option>
        <option value="politeh">Политехническая</option>
        <option value="ploshadmujestva">Площадь Мужества</option>
        <option value="lesnaya">Лесная</option>
        <option value="viborgskaya">Выборгская</option>
        <option value="ploshadlenina">Площадь Ленина</option>
        <option value="chernishevskaya">Чернышевская</option>
        <option value="ploshadvosstania">Площадь Восстания</option>
        <option value="vladimirskaya">Владимирская</option>
        <option value="pushkinskaya">Пушкинская</option>
        <option value="tehuniversitet">Технологический институт</option>
        <option value="baltiskaya">Балтийская</option>
        <option value="narvskaya"> Нарвская</option>
        <option value="kirovskii">Кировский завод</option>
        <option value="avtovo">Автово</option>
        <option value="leninskiiprospect"">Ленинский проспект</option>
        <option value="prospectveteranov">Проспект Ветеранов</option>

    </select>





    <label for="email"> email </label>
	<input type="email" name="email" id="email" required/> <br />
	
	<label for="password"> password </label>
	<input type="password" name="password" id="password" required/> <br />
	
	<img src="views/chapta.php" /> <br>
	<input type="text" name="chapta" id="chapta" onKeyPress="return numbersonly(this, event)"required /> 
	<button type="submit">submit </button>
</form>

This is end registration form:<br /><br /><br />