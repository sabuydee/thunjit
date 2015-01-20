<div style="margin-top: 15px;">
    <span>
        <?php
        
        $this->link->title = 'Home';
        $this->link->attr = "href='employee' style='color: #fff;'";
        $this->link->image = 'glyphicon glyphicon-home';
        $this->link->show();

        $this->link->title = 'About';
        $this->link->attr = "href='employee/about' style='color: #fff;' container='#container'";
        $this->link->image = 'glyphicon glyphicon-info-sign';
        $this->link->show();
        ?>
    </span>
    <span style=" float: right;">
        <?php
        $this->link->title = 'Login';
        $this->link->attr = "href='User/login' style='color: #fff;' container='#container'";
        $this->link->image = 'glyphicon glyphicon-log-in';
        $this->link->show($this->ModelUser->isGuest());

        $this->link->title = $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname');
        $this->link->attr = "style='color: #0ff;'";
        $this->link->image = '';
        $this->link->show(!$this->ModelUser->isGuest());

        $this->link->title = 'แก้ไขข้อมูลส่วนตัว';
        $this->link->attr = "href='ManageUser/Edit/".$this->session->userdata('id')."' style='color: #fff;' container='#container'";
        $this->link->image = 'glyphicon glyphicon-edit';
        $this->link->show(!$this->ModelUser->isGuest());

        $this->link->title = 'Logout';
        $this->link->attr = "href='User/Logout' style='color: #fff;'";
        $this->link->image = 'glyphicon glyphicon-log-out';
        $this->link->show(!$this->ModelUser->isGuest());
        ?>
    </span>
</div>

<div style="margin-top: 15px;">
    <?php
    
    
    $this->dropdown->title = "ระบบพื้นฐาน";
    $this->dropdown->class = 'btn label-info';
    $this->dropdown->list = array(
        array('title' => 'จัดการผู้ใช้งานระบบ',
            'attr' => 'href="ManageUser/Index" container="#container"'),
    );
    $this->dropdown->show(
            $this->session->userdata('user_group_id') == GROUP_OWNER
            || $this->session->userdata('user_group_id') == GROUP_ADMIN
    );
    
    $this->dropdown->title = "ระบบการเดินรถ";
    $this->dropdown->class = 'btn label-info';
    $this->dropdown->list = array(
        array('title' => 'จัดการเส้นทางเดินรถ',
            'attr' => 'href="ManageRoute/Index" container="#container"'),
    );
    $this->dropdown->show(
            $this->session->userdata('user_group_id') == GROUP_OWNER
            || $this->session->userdata('user_group_id') == GROUP_ADMIN
    );

    $this->dropdown->title = "ระบบจัดการตั๋ว";
    $this->dropdown->class = 'btn label-info';
    $this->dropdown->list = array(
        array('title' => 'เมนู',
            'attr' => 'href="Ticket/index" container="#container"')
    );
    $this->dropdown->show(
            $this->session->userdata('user_group_id') == GROUP_OWNER
            || $this->session->userdata('user_group_id') == GROUP_ADMIN
            || $this->session->userdata('user_group_id') == GROUP_EMPLOYEE
    );

    $this->dropdown->title = "ระบบรายงาน";
    $this->dropdown->class = 'btn label-info';
    $this->dropdown->list = array(
        array('title' => 'จัดการกลุ่มผู้ใช้ และกำหนดสิทธิการใช้งาน',
            'attr' => 'href="usergroup/index" container="#Container"'),
        array('title' => 'จัดการผู้ใช้',
            'attr' => 'href="user/index" container="#Container"'),
        array('title' => 'Action1',
            'attr' => 'href="#"')
    );
    $this->dropdown->show(
            $this->session->userdata('user_group_id') == GROUP_OWNER
            || $this->session->userdata('user_group_id') == GROUP_ADMIN
            || $this->session->userdata('user_group_id') == GROUP_MANAGER
    );

    $this->dropdown->title = "ระบบ Comment";
    $this->dropdown->class = 'btn label-info';
    $this->dropdown->list = array(
        array('title' => 'จัดการกลุ่มผู้ใช้ และกำหนดสิทธิการใช้งาน',
            'attr' => 'href="usergroup/index" container="#Container"'),
        array('title' => 'จัดการผู้ใช้',
            'attr' => 'href="user/index" container="#Container"'),
        array('title' => 'Action1',
            'attr' => 'href="#"')
    );
    $this->dropdown->show(
            $this->session->userdata('user_group_id') == GROUP_OWNER
            || $this->session->userdata('user_group_id') == GROUP_ADMIN
            || $this->session->userdata('user_group_id') == GROUP_MANAGER
            || $this->session->userdata('user_group_id') == GROUP_EMPLOYEE
    );
    ?>
</div>