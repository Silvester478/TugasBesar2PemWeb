<!DOCTYPE HTML>

<html>
<head>
    <meta charset="UTF-8">
    <title>Curriculum Vitae</title>
    <style>
        body {
        margin: 40px;
        font-family: "Adobe Caslon Pro", "Minion Pro", serif;
        font-size: 12pt;
        }

        header {
            font-family: "Trajan Pro", serif;
            padding-bottom: 10px;
        }

        header h1 {
            font-size: 20pt;
            letter-spacing: 2pt;
            border-bottom: 1px solid black;
            margin-bottom: 4px;
        }

        header span {
            font-size: 10pt;
            float: right;
        }

        section h2 {
            font-family: "Trajan Pro", serif;
            font-size: 14pt;
        }

        section p {
            margin-left: 40px;
        }

        section.coverletter {
            margin-top: 40px;
        }

        section.coverletter p {
            margin-left: 0px;
        }

        section ul {
            list-style-type: circle;
        }

        .jobtable {
            display: table;
            width: 100%;
            border-bottom: 1px solid black;
            margin-left: 20px;
        }

        .education {
            display: table;
            width: 100%;
            margin-left: 20px;
        }

        .edtable {
            display: table;
            width: 100%;
            margin-left: 20px;
            padding-bottom: 15px;
        }

        .skillstable {
            display: table;
            width: 100%;
        }

        .table {
            display: table;
            margin-left: 20px;
        }

        .tablerow {
            display: table-row;
        }

        .jobtitle {
            display: table-cell;
            font-style: italic;
        }

        .right {
            display: table-cell;
            text-align: right;
        }

        .cell {
            display: table-cell;
        }

        .onlinecell {
            font-style: italic;
            padding-right: 10px;
        }

        .urlcell {
            display: table-cell;
            letter-spacing: 1px;
        }

        .pagebreak {
            page-break-before: always;
        }
    </style>
        
    </head>

<body>
    <header id="info">
        <h1> <?= $profile['name'] ?> </h1>
        <h2> <?= $profile['title'] ?> </h2>
        <p> Date of  Birth : <?= $profile['date_of_birth'] ?></p>
        <p> Phone : <?= $profile['phone'] ?> </p>
        <p> Email : <?= $profile['email'] ?> </p>
        <p> Address : <?= $profile['address'] ?> </p>

    </header>
    <section id="statement">
        <h2>Description</h2>
        <p> <?= $profile['description'] ?></p>
    </section>

    <section id="employment">
        <h2>Experiences</h2>
        <?php
            foreach($experiences as $experience) {?>
        <section>
            <div class="jobtable">
            <div class="tablerow">
                <span class="jobtitle"> <?= $experience['title']?> </span>
                <span class="right"> <?= $experience['start_date']?> until <?= $experience['end_date']?> </span>
            </div>
            
            <div class="tablerow">
                <span class="jobtitle"> <?= $experience['company_name']?> </span>
            </div>
            </div>
            <p>
                <?= $experience['description']?>     
            </p>
        </section>
        <?php } ?>
    </section>
    
    <section id="skills">
        <h2>Skills</h2>
        <?php
            foreach($skills as $skill) {?>
        <section>
            <div class="skillstable">
                <div class="tablerow">
                    <ul class="cell">
                        <li> <?= $skill['name']?> </li>
                    </ul>
                </div>
            </div>
        </section>
        <?php } ?>    
    </section>
                
    <section id="education">
        <h2>Education</h2>
        <?php
            foreach($educations as $education) {?>
        <section>
            <div class="jobtable">
            <div class="tablerow">
                <span class="jobtitle"> <?= $education['title']?> </span>
                <span class="right"> <?= $education['start_date']?> until <?= $education['end_date']?> </span>
            </div>
            
            <div class="tablerow">
                <span class="jobtitle"> <?= $education['name']?> </span>
            </div>
            </div>
        </section>
        <?php } ?>
    </section>
</body>
</html>