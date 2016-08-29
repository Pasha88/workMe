This is edit form: <br/>
<div id="editform" style="display: block; float: left">
<form name="editionForm" id="editionForm" action="index.php?page=member&action=editconfirm" method="post">

<?php /*
    <tr> <td>ID:  </td> <td> <?php echo $this->member->member_id ?> </td> </tr>
    <tr> <td>FirstName </td> <td><?php echo $this->member->FirstName ?>  </td> </tr>
    <tr> <td> LastName: </td> <td><?php echo $this->member->LastName ?>  </td> </tr>
    <tr> <td>username: </td> <td><?php echo $this->member->member_id ?>  </td> </tr>
    <tr> <td> email:</td> <td> <?php echo $this->member->email ?> </td> </tr>
    <tr> <td> role:</td> <td><?php echo $this->member->role ?>  </td> </tr>
    <tr> <td> job1:</td> <td><?php echo $this->member->job1 ?>  </td> </tr>
    <tr> <td> job2:</td> <td><?php echo $this->member->job2 ?>  </td> </tr>
    <tr> <td> job3:</td> <td><?php echo $this->member->job3 ?>  </td> </tr>
    <tr> <td> Credits:</td> <td> <?php echo $this->member->credits ?> </td> </tr> */
   ?>

    <label for="Firstname"> Firstname </label>
    <input type="text" name="Firstname" id="Firstname" value="<?php echo $this->member->FirstName ?>" required /> <br />

    <label for="LastName"> LastName </label>
    <input type="text" name="LastName" id="LastName" value="<?php echo $this->member->LastName ?>" required/> <br />


    <label for="job1"> job1 </label>
    <select name="job1" id="job1" value="<?php echo $this->member->job1 ?>" required>
        <option value="taxi">taxi driver</option>
        <option value="compmaster">Comp master</option>
        <option value="homemaster">Home master</option>
        <option value="tutor">Tutor</option>
    </select>

    <label for="job2"> job2 </label>
    <select name="job2" id="job2"  value="<?php echo $this->member->job2 ?>"required>
        <option value="taxi">taxi driver</option>
        <option value="compmaster">Comp master</option>
        <option value="homemaster">Home master</option>
        <option value="tutor">Tutor</option>
        <option value="none">None</option>
    </select>


    <label for="job3"> job3 </label>
    <select name="job3" id="job3"  value="<?php echo $this->member->job3 ?>" required>
        <option value="taxi">taxi driver</option>
        <option value="compmaster">Comp master</option>
        <option value="homemaster">Home master</option>
        <option value="none">None</option>
    </select>

    <label for="subway"> subway </label>
    <select name="subway" id="subway"  value="<?php echo $this->member->subway ?>" required>

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
    <input type="email" name="email" id="email"  value="<?php echo $this->member->email ?>" required/> <br />

    <label for="password"> password </label>
    <input type="password" name="password" id="password"  value="<?php echo $this->member->password ?>" required/> <br />

    <input type="hidden" name="member_id" id="LastName" value="<?php echo $this->member->member_id ?>"/> <br />

    <img src="views/chapta.php" /> <br>
    <input type="text" name="chapta" id="chapta" onKeyPress="return numbersonly(this, event)"required />
    <button type="submit">submit </button>
</form>
</div>
