<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/vendor/pace.min.js') }}"></script>
<!-- Plugins and scripts required by all views -->
<script src="{{ asset('js/vendor/Chart.min.js') }}"></script>
<!-- CoreUI main scripts -->
<script src="{{ asset('js/app.js')}}"></script>

{{-- <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.js')}}"></script>--}}
{{-- <script src="{{ asset('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js')}}"></script>  --}}



{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />--}}

<script src="{{ asset('js/vendor/cdn.js')}}"></script>
<script src="{{ asset('js/vendor/cdn1.js')}}"></script>



<script>

    function calculateRepaymentAmount(){
        var percentage = $('#repayment_percentage').val();
        console.log(percentage);
        var amountPaid = $('#amount_paid').val();
        console.log(amountPaid);
        var repaymentAmount = (percentage * amountPaid)/100;
        
        $('#repayment_amount').val(repaymentAmount);
    }

    function loadDevelopers() {
        var owner = $('#owner').val();

        if (owner == 'Developer'){
            getDevelopers();
//            console.log(developers);
//
//            $("#developer").replaceWith('<select type="text" id="developer" name="developer" class="form-control" required>' +
//                '<option selected disabled>Select Developer</option>' +
//                $.each(developers, function (i, item) {
//                    '<option value= '+item.id+'>'+item.name+' '+item.address+'</option>'
//                })+
//
//                '</select>');
        }
        else{
            $("#developer").replaceWith('<input type="text" id="developer" name="developer" class="form-control" readonly>');
        }
    }

    function getDevelopers() {
        var url = '/housing/getDevelopers';
        $.ajax({
            url : url,
            method : "get",
            data : {url: url},
            dataType : "text",
            success : function(data)
            {
                //console.log(data);
                var developers = JSON.parse(data);
                console.log(data);
                var trHTML = '<select  id="developer" name="developer" class="form-control input-group-lg reg_name" required > <option selected disabled>Select Developer</option>'
                $.each(developers, function (i, item) {
                      trHTML += '<option value= '+item.id+'>'+item.name +' - '+ item.address+'</option>';
                });
                $('#developer').replaceWith(trHTML);
            }
        });
    }


    function allocate(id) {
        console.log('My application id is '+id)
        $('#stand_application_id').val(id);
    }

    function approve(decision){
        console.log('My decision id is '+decision);
        $('#decision').val(decision);
    }

    function getTransactionId(id) {
        $('#transactionId').val(id);
    }

    function getRefundDetails(id, balance) {
        $('#idrefund').val(id);
        $('#amountRefund').val(balance);
    }
    function hideRefundNumber() {
        var paymentAmount = $('#cmbRefundType').val();
        console.log(paymentAmount);
        if (paymentAmount != 'Ecocash'){
            $("#mobileRefund").replaceWith('<input type="text" id="mobileRefund" name="mobile" class="form-control" readonly>');
        }
        else{
            $("#mobileRefund").replaceWith('<input type="text" id="mobileRefund" name="mobile" class="form-control" required>');
        }
    }
    function getProductInfo(id, name , duedate) {
        console.log(duedate);
        $('#prodName').html(name);
        $('#productId').val(id);
        $('#productName').val(name);
        $('#productDueDate').val(duedate);

    }

    function getRolloverLoanDetails(id) {
        var url = '/loanpro/getLoan/'+id;
        $.ajax({
            url : url,
            method : "get",
            data : {id : id, url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);
                var obj = JSON.parse(data);
                //{"loanId":23749,"accountNo":"198172017","loanAmount":"307.00","balance":"-68.00","dueDate":"2020-05-31","interest":"30.00"}
                $("#loanTransactions .modal-body #loanId").val( obj.loanId );
                $("#loanTransactions .modal-body #accountNumber").val( obj.accountNo );
                $("#loanTransactions .modal-body #loanAmount").val( obj.loanAmount );
                $("#loanTransactions .modal-body #loanBalance").val( obj.balance );
                $("#loanTransactions .modal-body #dueDate").val( obj.dueDate );
                $("#loanTransactions .modal-body #interestRate").val( obj.interest );
                //loanTransactions
            }
        });
    }


    function makeSelect() {
        $("#Sex").replaceWith('<select id="Sex" name="Sex" class="form-control">' +
            '<option value="1">Male</option>' +
            '<option value="0">Female</option>' +
            '</select>');
    }
    
    function getFloatBalance(id, username, balance) {
        $('#floatAmount').val('');
        $('#flatNewBalance').val('');
        $('#floatBalance').val(balance);
        $('#loanOfficer').val(username);
        $('#id').val(id);
    }

    function getWithDrawalBalance(id, username, balance) {
        $('#floatAmountw').val('');
        $('#flatNewBalancew').val('');
        $('#floatBalancew').val(balance);
        $('#loanOfficerw').val(username);
        $('#idw').val(id);
    }

    function calculateNewWithdrawalBalance() {
        var floatAmount = $('#floatAmountw').val();
        var floatBalance = $('#floatBalancew').val();
        var newFloatBalance =  Number(floatBalance)-Number(floatAmount);
        $('#flatNewBalancew').val(newFloatBalance);
    }

    function calculateNewFlatBalance() {
        var floatAmount = $('#floatAmount').val();
        var floatBalance = $('#floatBalance').val();
        var newFloatBalance = Number(floatAmount) + Number(floatBalance);
        $('#flatNewBalance').val(newFloatBalance);
    }

    function calculateNewBalance() {
        var amount = $('#topUpAmount').val();
        var interestRate = $('#interestRate').val();
        var balance = $('#loanBalance').val();
        var principal = $('#loanAmount').val();
        var interest = (interestRate / 100) * amount;
        var adminFee = (12/100)  * Number(amount);
        //console.log(interest);
        var newBalance = Number(balance) + Number(interest) + Number(amount);
        var newLoanAmount = Number(principal) + Number(amount);
        $('#newLoanBalance').val(Math.round(newBalance));
        $('#newLoanAmount').val(Math.round(newLoanAmount));
        $('#topUpadmin_fee').val(Math.round(adminFee));
    }

    function calculateNewLoanBalance() {
        var amount = $('#principalN').val();
        var interestRate = $('#interest_rateN').val();
        //var balance = $('#balanceN').val();
       // var principal = $('#principalN').val();
        var interest = (interestRate / 100) * amount;
        var adminFee = (12/100)  * Number(amount);
        console.log(interest);
        var newBalance = Number(interest) + Number(amount);
       // var newLoanAmount = Number(principal) + Number(amount);
        $('#balanceN').val(Math.round(newBalance));
        //$('#newLoanAmount').val(newLoanAmount);
        $('#adminFeeN').val(Math.round(adminFee));
    }

    function getLoanDetail(id, accountnumber, loanAmount, balance) {
        console.log(id);
        $('#balancer').val(balance);
        $('#loanAmountr').val(loanAmount);
        $('#loanIdr').val(accountnumber);
        $('#idr').val(id);
    }

    function calcualeRepaymentBalance() {
        $('#newBalancer').val("");
        var discount = $('#discountr').val();
        var balance = $('#balancer').val();
        var amount = $('#amountr').val();
        var newBalance = Number(balance) -  (Number(discount) + Number(amount));
        $('#newBalancer').val(Math.round(newBalance));
    }

    function hidePhoneNumber() {
        var paymentAmount = $('#paymethodtyper').val();
        console.log(paymentAmount);
        if (paymentAmount != 15){
            $("#mobiler").replaceWith('<input type="text" id="mobiler" name="mobile" class="form-control" readonly>');
        }
        else{
            $("#mobiler").replaceWith('<input type="text" id="mobiler" name="mobile" class="form-control" required>');
        }
    }

    function hidePhone(){
        var loanType = $('#topUptransaction_type_id').val();
        console.log(loanType);
        if (loanType == 'Ecocash'){
            $("#topUpMobile").replaceWith('<input type="text" id="topUpMobile" name="mobile" class="form-control" required>');
        }
        else{
            $("#topUpMobile").replaceWith('<input type="text" id="topUpMobile" name="mobile" class="form-control" readonly>');
        }
    }

    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myList option").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });


    $(document).ready(function() {
        $('#example').DataTable();
    } );

    $(document).ready(function(){
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    });

    function addClass(grade_id) {
        console.log(grade_id);
        $("#addClass .modal-body #grade_id").val( grade_id );
    }


    $('#timetable_id').change(function(){
        //$('#example tbody').html('');
        var id = $(this).val();
        var url = "localhost:8000/groups/"+id;

        $.ajax({
            method : "GET",
            data : { url: url},
            dataType : "json",
            success : function(data)
            {
                console.log(data);

//                var obj = JSON.parse(data);
//
//                var trHTML = '';
//                $.each(obj, function (i, item) {
//
//                    trHTML += '<tr><td>' + item.AcYear + '</td><td>' + item.GroupName  + '<a class="pull-right" title="Remove Student" onclick="removeStudent('+item.OptGroupID+')"><i class="fa fa-trash"></i></a>' + '</td></tr>';
//                });
//                $('#example').append(trHTML);


            }
        });

    })

    function getSubjectGroup(url) {
        $('#example tbody').html('');
        $.ajax({
            url : url,
            method : "GET",
            data : {staffid : id, url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);

                var obj = JSON.parse(data);

                var trHTML = '';
                $.each(obj, function (i, item) {

                    trHTML += '<tr><td>' + item.AcYear + '</td><td>' + item.GroupName  + '<a class="pull-right" title="Remove Student" onclick="removeStudent('+item.OptGroupID+')"><i class="fa fa-trash"></i></a>' + '</td></tr>';
                });
                $('#example').append(trHTML);
            }
        });
    }

    function  getMembers(url, name, id) {
        console.log(id);
        $("#editGroup .modal-header .modal-title").html(name);
        document.getElementById('groupid').value = id;
        // $("#editGroup .modal-body #groupid").value = id;
        $('#membersTable tbody').html('');
        $.ajax({
            url : url,
            method : "GET",
            data : {url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);

                var obj = JSON.parse(data);

                var trHTML = '';
                $.each(obj, function (i, item) {

                    trHTML += '<tr><td>' + item.Name +  '<a class="pull-right text-danger" title="Remove Student" onclick="removeMember('+item.id+')"><i class="fa fa-trash"></i></a>' + '</td></tr>';
                });
                $('#membersTable').append(trHTML);
            }
        });
    }

    function refresh()
    {
        var id = document.getElementById('groupid').value;
        var url = '/xul/getMembers/'+id;
        $('#membersTable tbody').html('');
        $.ajax({
            method : "GET",
            data : {url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);
                var obj = JSON.parse(data);
                var trHTML = '';
                $.each(obj, function (i, item) {
                    trHTML += '<tr><td>' + item.Name +  '<a class="pull-right text-danger" title="Remove Student" onclick="removeMember('+item.id+')"><i class="fa fa-trash"></i></a>' + '</td></tr>';
                });
                $('#membersTable').append(trHTML);
            }
        });
    }

    function deleteGroup(id) {
        if (confirm('Are You sure you want to delete Group'))
        {
            var url = '/xul/removegroup/'+id;
            $.ajax({
                url : url,
                method : "GET",
                data : {url: url},
                dataType : "text",
                success : function(data)
                {
                    console.log(data);
                }
            });
        }
    }

    function  removeMember(id) {
        if (confirm('Are You sure you want to delete Member'))
        {
            var url = '/xul/removemember/'+id;
            //_token: '{{csrf_token()}}'
            // var cl = document.getElementById("RowID").innerHTML;
            //var url1 = '/xul/getClassStudent/'+cl;
            $.ajax({
                url : url,
                method : "GET",
                data : {url: url},
                dataType : "text",
                success : function(data)
                {
                    console.log(data);
                    //getClassStudent(cl, url1)
                }
            });
        }

    }

    function addgroupmember()
    {
        var staffid = document.getElementById('memberid').value;
        var groupid = document.getElementById('groupid').value;

        var url = '/xul/addmember';
        
        $.ajax({
            url : url,
            method : "POST",
            data : {url: url, _token: '{{csrf_token()}}', staffid:staffid, groupid:groupid},
            dataType : "text",
            success : function(data)
            {
                $('#membersTable tbody').html('');
                console.log(data);
                var obj = JSON.parse(data);
                var trHTML = '';
                $.each(obj, function (i, item) {
                    trHTML += '<tr><td>' + item.Name +  '<a class="pull-right" title="Remove Student" onclick="removeStudent('+item.id+')"><i class="fa fa-trash"></i></a>' + '</td></tr>';
                });
                $('#membersTable').append(trHTML);
            }
        });
        //refresh();
    }

    function getSetIDComment(id, comment, student, year, term, subject, studentid) {
        console.log(id);
        $("#commentModal .modal-body #AcadID").val(id);
        $("#commentModal .modal-header .modal-title").html( student );
        $("#commentModal .modal-body #comment").val(comment);
        $("#commentModal .modal-body #year").val(year);
        $("#commentModal .modal-body #term").val(term);
        $("#commentModal .modal-body #subject").val(subject);
        $("#commentModal .modal-body #studentid").val(studentid);
    }

    function getComment() {

        var skillsSelect = document.getElementById("commentSelector");
        var selectedText = skillsSelect.options[skillsSelect.selectedIndex].text;

        $("#commentModal .modal-body #comment").val(selectedText);
    }

    function insertVariable(value) {
        //console.log(value);

        var msg = document.getElementById('msg').value;
        //console.log(msg);
        msg += value;
        //console.log(msg);
        document.getElementById('msg').value = msg;
    }

    function getSetStudents(id, url, setName)
    {
        $('#setStudent tbody').html('');

        console.log(setName);
        // document.getElementById("SetName").innerHTML =  '';
         document.getElementById("RowID").innerHTML =  id;
         document.getElementById("SetName").innerHTML =  setName;

        $.ajax({
            url : url,
            method : "GET",
            data : {staffid : id, url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);

                var obj = JSON.parse(data);

                var trHTML = '';
                $.each(obj, function (i, item) {
                    //document.getElementById("Size").innerHTML =  item.Size;
                    //document.getElementById("SetName").innerHTML =  item.Class;
                    //document.getElementById("RowID").innerHTML =  item.RowID;
                    trHTML += '<tr><td>' + item.StudentID + '</td><td>' + item.Name + '</td><td>' + item.class +  '</td><td>' + '<a class="pull-right text-warning" title="Print Student Report" onclick="printStudentReport('+item.StudentID+', '+item.Term+','+item.Year+')"><i class="fa fa-print"></i></a>' + '</td></tr>';
                });
                $('#setStudent').append(trHTML);


            }
        });

    }

    function getClassData() {
        var cl = document.getElementById("ClassName").innerHTML;
        if (cl != '')
        {
            $("#addStudent .modal-header .modal-title").html( 'Add Students to '+cl+' Class' );
            $("#addStudent .modal-body #studClass").val( cl );
        }
        else
        {
            alert('Please Select a Class First');
            return;
        }
    }

    function getSetData() {
        var cl = document.getElementById("RowID").innerHTML;
        //alert(cl);
        if (cl != '')
        {
           // $("#addStudentSet .modal-header .modal-title").html( 'Add Students to '+cl+' Class' );
            $("#addStudentSet .modal-body #OGSID").val( cl );
        }
        else
        {
            alert('Please Select a Class First');
            return;
        }
    }

    function getLoanDetails(id) {
        var url = '/loanpro/getLoan/'+id;
        $.ajax({
            url : url,
            method : "get",
            data : {id : id, url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);
                var obj = JSON.parse(data);
                //{"loanId":23749,"accountNo":"198172017","loanAmount":"307.00","balance":"-68.00","dueDate":"2020-05-31","interest":"30.00"}
                $("#loanTransactions .modal-body #loanId").val( obj.loanId );
                $("#loanTransactions .modal-body #accountNumber").val( obj.accountNo );
                $("#loanTransactions .modal-body #loanAmount").val( obj.loanAmount );
                $("#loanTransactions .modal-body #loanBalance").val( obj.balance );
                $("#loanTransactions .modal-body #dueDate").val( obj.dueDate );
                $("#loanTransactions .modal-body #interestRate").val( obj.interest );
                $("#loanTransactions .modal-body #loanProduct").val( obj.product );
                //loanTransactions
            }
        });
    }

    function getSets(id, url) {
        $('#subSet tbody').html('');

        // document.getElementById("Sizes").innerHTML =  '';
        //document.getElementById("SetName").innerHTML =  setName;
        // document.getElementById("ClassName").innerHTML =  cla;

        $.ajax({
            url : url,
            method : "GET",
            data : {staffid : id, url: url},
            dataType : "text",
            success : function(data)
            {
                //console.log(data);

                var obj = JSON.parse(data);

                var trHTML = '';
                $.each(obj, function (i, item) {
                    //document.getElementById("Size").innerHTML =  item.Size;
                    //document.getElementById("SetName").innerHTML =  item.Class;
                    //document.getElementById("RowID").innerHTML =  item.RowID;
                    trHTML += '<tr><td>' + item.Code + '</td><td>' + item.Subject + '</td><td>' + item.Teacher +  '</td><td>' + item.Students +  '</td><td>'+ '<a class="pull-right text-danger"  title="Remove Set" onclick="removeSet('+item.ID+')"><i class="fa fa-trash"></i></a>' + '</td></tr>';
                });
                $('#subSet').append(trHTML);
            }
        });

    }

    function removeSet(id) {
        if (confirm('Are you sure you want to delete the set'))
        {
            var url = '/xul/removeSet/'+id;
            $.ajax({
                url : url,
                method : "get",
                data : {id : id, url: url},
                dataType : "text",
                success : function(data)
                {
                    console.log(data);
                }
            });
        }
    }



    function getSet(cl, f) {
        $("#createSet .modal-body #OGID").val( cl );
        $("#createSet .modal-body #AcYear").val( f );

        console.log(cl+ ' '+f);
    }

    function deleteProduct(id) {
        console.log('The id is : '+id);
        $("#deleteP .modal-body #id").val( id );
    }

    function getProductData(){
        var selectedProduct = document.getElementById("loan_product_id");
        var selectedValue = selectedProduct.options[selectedProduct.selectedIndex].value;
        console.log(selectedValue);
        getProduct(selectedValue);
    }

    function getTransaction(){
        var selectedProduct = document.getElementById("transaction_type_id");
        var selectedValue = selectedProduct.options[selectedProduct.selectedIndex].text;
        console.log(selectedValue);
        if (selectedValue == 'Cash Disbursement' || selectedValue == 'Bank Transfer' ){
           // document.getElementById("mobile")
            $("#mobile").replaceWith('<input id="mobile" name="mobile"  class="form-control" readonly>');
        }
        else{
            $("#mobile").replaceWith('<input id="mobile" name="mobile"  class="form-control" required>');
        }
    }

    function getProduct(id)
    {
        var url = '/loanpro/getproduct/'+id;
        $.ajax({
            url : url,
            method : "GET",
            data : { url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);
                 var obj = JSON.parse(data);
                document.getElementById("interest_rateN").value =  obj.interest;
                document.getElementById("duedate").value =  obj.duedate;
                document.getElementById("allowed_max").value =  obj.allowed_max;
                document.getElementById("allowed_min").value =  obj.allowed_min;
            }
        });
    }

    function getStaffIDForRoles() {
        var id = document.getElementById("selected_id").innerHTML;
        $("#rolesAssign .modal-body #staff_id_for_roles").val( id );

    }

    $(document).on('blur', '.oComment', function(){

        var studentid = $(this).data('studentid');
        var comment =  document.getElementById(studentid).value;
        var year = $(this).data('year');
        var term = $(this).data('term');
        var token = $(this).data('token');
        var url = $(this).data('url');//StudYear
        var grade = $(this).data('grade');

        //document.querySelector("#\\32 9376")

        // console.log(comment);
        // console.log(studentid);
        // console.log(year);
        // console.log(token);
        // console.log(url);
        // console.log(term);
        // console.log(grade);

        if (comment != ''){
            insertOverallComment(comment, grade, studentid, token, url,year, term)
        }
        return;
    });

    function insertOverallComment(comment, grade, studentid, token, url,year, term)
    {
        $.ajax({
            url : url,
            method : "POST",
            data : {grade : grade, comment : comment, studentid:studentid, _token: token, year:year, term:term },
            dataType : "text",
            success : function(data)
            {
                console.log(data);

            }
        });
    }

    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });



    function getSubjectID(id, url)
    {
        $.ajax({
            url : url,
            method : "GET",
            data : {staffid : id, url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);
                var obj = JSON.parse(data);

                document.getElementById("SubjID").value =  obj.SubjID;
                document.getElementById("SubjCode").value =  obj.SubjCode;
                document.getElementById("Subject").value =  obj.Subject;
                document.getElementById("Seq").value =  obj.Seq;
                document.getElementById("Lvl").value =  obj.Lvl;
                //document.getElementById("SignFile").value =  obj.SignFile;
//                document.getElementById("Age").value =  obj.Age;
//                document.getElementById("Position").value =  obj.Position;
//                document.getElementById("Depart").value =  obj.Depart;
//                document.getElementById("ReportTo").value =  obj.rr;
//                document.getElementById("Cell").value =  obj.Cell;
//                document.getElementById("Disabled").value =  obj.Disabled;
//                //document.getElementById("PhoneWork").value =  obj.PhoneWork;
//                //document.getElementById("Addr1").value =  obj.Addr1;
//                document.getElementById("ID").value =  obj.ID;
//                document.getElementById("Birth").value =  obj.Birth;
////                document.getElementById("Photo").value =  obj.Photo;
//                document.getElementById("Code").value =  obj.Code;


            }
        });
    }




    $(document).on('mouseover','.exam_mark', function(){
        var examid = $(this).data('id1');
        var studentid = $(this).data('student_number');
        var url = '/getmarks/'+examid+'/'+studentid;

        getmarks(examid, studentid, url);

    });


    $(function () {
        var students = document.getElementById('students').value;
        var i = 1;
        while(students.length > i+1)
        {
            var studentid = (students[i]);
            console.log(studentid);
            i++;
        }
    });




    function LoadMarks(students, examid) {
        var students = students;
        var i = 0;
        while(students.length > i)
        {
            var studentid = students[i];
            var examid = examid;

            //var examid = $(this).data('id1');
            //var studentid = $(this).data('student_number');
            var url = '/getmarks/'+examid+'/'+studentid;

            getmarks(examid, studentid, url);

            i++;
        }
    }
    $(document).on('blur', '.exams', function(){
        var mark = $(this).text();
        var gradeid = $(this).data('gradeid');
        var year = $(this).data('year');
        var term = $(this).data('term');
        var subjectid = $(this).data('subjectid');
        var studentid = $(this).data('student_number');
        var token = $(this).data('token');
        var url = $(this).data('url');
        console.log(gradeid);
        console.log(studentid);
        console.log(mark);
        console.log(subjectid);
        console.log(token);
        console.log(url);
        //alert(total);

        if (mark > -1){
            if (mark < 101 )
            {
                insertMark(gradeid, subjectid, studentid,mark, token, url, year, term);
                return;
            }
            else
            {
                alert("Student Mark cannot be greater than the total");
                return false;
            }

        }
        return;
    });

    function reset() {
        var elements = document.getElementsByTagName("input") ;
        for (var ii=0; ii < elements.length; ii++) {
            if (elements[ii].type == "text" ||elements[ii].type == "email" ) {
                elements[ii].value = "";
            }
        }

        $('select').each(
            function(index){
                var input = $(this);
                if (input.attr('name') != 'example_length')
                {
                    document.getElementById(input.attr('id')).value =  '';
                }
            }
        );

        $('#std tbody').html('');
        $('#std1 tbody').html('');

        $('#example tbody tr').removeClass("active");

    }

function selectedRow(){
    var index,
        table = document.getElementById("example");

    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
            // remove the background from the previous selected row
            if(typeof index !== "undefined"){
                table.rows[index].classList.toggle("selected");
            }
            console.log(typeof index);
            // get the selected row index
            index = this.rowIndex;
            // add class selected to the row
            this.classList.toggle("selected");
            console.log(typeof index);
        };
    }

}

$('#example').on('draw.dt', function () {
    $('#example').ready(function () {
        $(function () {
            $('#example tbody tr').click(function () {
                $('#example tbody tr').removeClass("active");
                $(this).addClass("active");
            });
        })
    });
});



function getParentID(id, url)
{
    var pid = '';
    $.ajax({
        url : url,
        method : "GET",
        data : {staffid : id, url: url},
        dataType : "text",
        success : function(data)
        {
            var obj = JSON.parse(data);


            pid =  obj.ParentID;

            document.getElementById("ParentID").value =  obj.ParentID;
            document.getElementById("FatherLName").value =  obj.FatherLName;
            document.getElementById("MotherLName").value =  obj.MotherLName;
            document.getElementById("MPHome").value =  obj.MPHome;
            document.getElementById("MPCell").value =  obj.MPCell;
            document.getElementById("MEmployer").value =  obj.MEmployer;
            document.getElementById("MotherID").value =  obj.MotherID;
            document.getElementById("FatherID").value =  obj.FatherID;


            document.getElementById("MPWork").value =  obj.MPWork;
            document.getElementById("MEmail").value =  obj.MEmail;
            document.getElementById("MNationID").value =  obj.MNationID;
            document.getElementById("MLangID").value =  obj.MLangID;
            //document.getElementById("MNotes").value =  obj.MNotes;
            document.getElementById("FPHome").value =  obj.FPHome;
            //document.getElementById("PhoneWork").value =  obj.PhoneWork;
            //document.getElementById("Addr1").value =  obj.Addr1;
            document.getElementById("FPCell").value =  obj.FPCell;
            document.getElementById("FEmployer").value =  obj.FEmployer;
            document.getElementById("MProfID").value =  obj.MProfID;
            document.getElementById("FProfID").value =  obj.FProfID;
            document.getElementById("FPWork").value =  obj.FPWork;

            document.getElementById("FEmail").value =  obj.FEmail;
            document.getElementById("FNationID").value =  obj.FNationID;
            document.getElementById("FLangID").value =  obj.FLangID;
            //document.getElementById("FNotes").value =  obj.FNotes;
            document.getElementById("Addr1").value =  obj.Addr1;
            document.getElementById("Addr2").value =  obj.Addr2;

            //alert('now');

            document.getElementById("Addr3").value =  obj.Addr3;
            document.getElementById("FatherFName").value =  obj.FatherFName;
            document.getElementById("MotherFName").value =  obj.MotherFName;
            document.getElementById("FatherAddr1").value =  obj.FatherAddr1;
            document.getElementById("FatherAddr3").value =  obj.FatherAddr3;
            document.getElementById("FatherAddr4").value =  obj.FatherAddr4;

            document.getElementById("MTitle").value =  obj.MTitle;
            document.getElementById("FTitle").value =  obj.FTitle;
            document.getElementById("StatusID").value =  obj.StatusID;

        },

        complete:function(){
//            $("#std tr").remove();
            $('#std tbody').html('');
            $('#std1 tbody').html('');
            $.ajax({
                url : 'http://localhost/xulzz/getChildren/'+pid,
                method : "GET",
                data : {pid : pid, url: 'http://localhost/xulzz/getChildren/'+pid},
                dataType : "Text",
                success : function(data)
                {
                    var response = JSON.parse(data);

                    var trHTML = '';
                    var trHTML1 = '';
                    $.each(response, function (i, item) {
                        if (item.StatusName == 'Current')
                        {
                            trHTML += '<tr><td>' + item.LastName + '</td><td>' + item.FirstName + '</td><td>' + item.TermYear+ '</td><td>' + item.Term+ '</td><td>' + item.Class + '</td></tr>';
                        }
                        else
                        {
                            trHTML1 += '<tr><td>' + item.LastName + '</td><td>' + item.FirstName + '</td><td>' + item.Gender2 + '</td></tr>';
                        }
                    });
                    $('#std').append(trHTML);
                    $('#std1').append(trHTML1);
                }
            });
        }

    });


}

    function  getStudent(parentid, url) {
        $.ajax({
            url : url,
            method : "GET",
            data : {parentid : parentid, url: url},
            dataType : "Text",
            success : function(data)
            {
                console.log(data);
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML += '<tr><td>' + item.LastName + '</td><td>' + item.FirstName + '</td><td>' + item.Gender2 + ' </td></tr>';
                });
                $('#std').append(trHTML);
//                console.log(data);
//                var obj = JSON.parse(data);
//                return obj;

            }
        });
    }

    function  getLangauge(parentid, url) {
        $.ajax({
            url : url,
            method : "GET",
            data : {parentid : parentid, url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);
                var obj = JSON.parse(data);


            }
        });
    }

    function  getPosition(parentid, url) {
        $.ajax({
            url : url,
            method : "GET",
            data : {parentid : parentid, url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);
                var obj = JSON.parse(data);


            }
        });
    }

    function getStudentID(id, url)
    {
        $("#BirthDate").prop('type', 'text');
        $.ajax({
            url : url,
            method : "GET",
            data : {staffid : id, url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);
                var obj = JSON.parse(data);

                document.getElementById("StudentID").value =  obj.StudentID;
                document.getElementById("MiddleName").value =  obj.MiddleName;
                document.getElementById("FirstName").value =  obj.FirstName;
                document.getElementById("LastName").value =  obj.LastName;
                document.getElementById("BirthDate").value = obj.BirthDate;// == true ? 'Male':'Female');
                document.getElementById("PassNo").value =  obj.PassNo;
                document.getElementById("BirthPlace").value =  obj.BirthPlace;
                document.getElementById("StatusID").value =  obj.StatusID;
                document.getElementById("ParentID").value =  obj.ParentID;
                document.getElementById("Age").value =  obj.Age;
                document.getElementById("NationalityID").value =  obj.NationalityID;
                document.getElementById("Email").value =  obj.Email;
                document.getElementById("Cell").value =  obj.Cell;
                document.getElementById("Address").value =  obj.Address;

                 document.getElementById("Class").value =  (obj.Class != '' ? obj.Class : "No Class");
                 document.getElementById("ReligionID").value =  obj.ReligionID;

            }
        });
    }


    function getClassStudent(id, url, cla)
    {
        $('#stdClass tbody').html('');

        document.getElementById("Size").innerHTML =  '';
        document.getElementById("ClassName").innerHTML =  '';
        document.getElementById("ClassName").innerHTML =  cla;
        $.ajax({
            url : url,
            method : "GET",
            data : {staffid : id, url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);

                var obj = JSON.parse(data);

                var trHTML = '';
                $.each(obj, function (i, item) {
                    document.getElementById("Size").innerHTML =  item.Size;
                    //document.getElementById("ClassName").innerHTML =  item.Class;
                    document.getElementById("RowID").innerHTML =  item.RowID;
                    trHTML += '<tr><td>' + item.StudentID + '</td><td>' + item.LastName+ ' , ' + item.FirstName + '</td><td>' + item.Grade +  '</td><td>' + '<a class="text-warning"  title="Print Mid-Term Report" onclick="printStudentReport('+item.StudentID+', '+item.Term+','+item.Year+')"> <i class="fa fa-file-pdf-o">  </i></a> ' + ' <a class="align-items-center text-success"  title="Print End of Term Report" onclick="printEndOfTermReport('+item.StudentID+', '+item.Term+','+item.Year+')"><i class="fa fa-file-pdf-o">  </i></a>'+'</td></tr>';
                });
                $('#stdClass').append(trHTML);


            }
        });
    }

    function printStudentReport(id, term, year) {
        window.open("/xul/printStudentReport/"+id+"/"+term+"/"+year, "_blank");
    }

    function printEndOfTermReport(id, term, year) {
        window.open("/xul/printEndOfTermReport/"+id+"/"+term+"/"+year, "_blank");
    }


    function  removeStudent(id) {
        if (confirm('Are You sure you want to delete Student'))
        {
            var url = '/xul/removeStudent/'+id;
            var cl = document.getElementById("RowID").innerHTML;
            var url1 = '/xul/getClassStudent/'+cl;
            $.ajax({
                url : url,
                method : "GET",
                data : {StudentID : id, url: url},
                dataType : "text",
                success : function(data)
                {
                    console.log(data);
                    getClassStudent(cl, url1)
                }
            });
        }

    }



    function getApplicantID(id, url)
    {
        $("#Sex").replaceWith('<input id="Sex" name="Sex" class="form-control">');
        $.ajax({
            url : url,
            method : "GET",
            data : {staffid : id, url: url},
            dataType : "text",
            success : function(data)
            {
                console.log(data);
                var obj = JSON.parse(data);

                document.getElementById("WaitListID").value =  obj.WaitListID;
                document.getElementById("MiddleName").value =  obj.MiddleName;
                document.getElementById("FirstName").value =  obj.FirstName;
                document.getElementById("LastName").value =  obj.LastName;
                document.getElementById("BirthDate").value = obj.BirthDate;// == true ? 'Male':'Female');
                document.getElementById("PassNo").value =  obj.PassNo;
                document.getElementById("BirthPlace").value =  obj.BirthPlace;
                document.getElementById("StudYear").value =  obj.StudYear;

                console.log('here');

                document.getElementById("PrevSchools").value =  obj.PrevSchools;
                document.getElementById("ParentID").value =  obj.ParentID;
                document.getElementById("StatusID").value =  obj.StatusID;
                document.getElementById("NationalityID").value =  obj.NationalityID;
                document.getElementById("Email").value =  obj.Email;
                document.getElementById("Cell").value =  obj.Cell;
                document.getElementById("Address").value =  obj.Address;


                document.getElementById("ApplDate").value =  obj.ApplDate;
                //document.getElementById("Birth").value =  obj.Birth;
//                document.getElementById("Photo").value =  obj.Photo;
               // document.getElementById("Code").value =  obj.Code;

                //getStudent(obj.StaffID, '')


            }
        });
    }

function changetoDate(id)
{
    //$(this).prop('type', 'date');

    $('#'+id).prop('type', 'date');
}

function getSetId(id) {
    var id = id;
    $("#createAssess .modal-body #setId").val( id );
}


    function getStaffID(id, url)
    {
        document.getElementById("selected_id").innerHTML  = id ;
        $('#StaffRoles').html('');
        $("#Birth").prop('type', 'text');
        $("#Sex").replaceWith('<input id="Sex" name="Sex" class="form-control">');
        $.ajax({
            url : url,
            method : "GET",
            data : {staffid : id, url: url},
            dataType : "text",
            success : function(data)
            {
               // console.log(data);
                var obj = JSON.parse(data);

                //console.log(obj.roles);

                document.getElementById("StaffID").value =  obj.StaffID;
                document.getElementById("Title").value =  obj.Title;
                document.getElementById("FirstName").value =  obj.FirstName;
                document.getElementById("LastName").value =  obj.LastName;
                document.getElementById("Sex").value = (obj.Sex == true ? 'Male':'Female');
                document.getElementById("Email").value =  obj.Email;
                document.getElementById("NatID").value =  obj.NatID;
                //document.getElementById("Age").value =  obj.Age;
                document.getElementById("StatusID").value =  obj.StatusID;


                document.getElementById("Position").value =  obj.Position;
                document.getElementById("Depart").value =  obj.Depart;
                document.getElementById("ReportTo").value =  obj.ReportTo;
                document.getElementById("Cell").value =  obj.Cell;
                document.getElementById("Disabled").value =  obj.Disabled;
                //document.getElementById("PhoneWork").value =  obj.PhoneWork;
                //document.getElementById("Addr1").value =  obj.Addr1;
                document.getElementById("ID").value =  obj.ID;

                document.getElementById("Birth").value =  obj.Birth;
//                document.getElementById("Photo").value =  obj.Photo;
                document.getElementById("Code").value =  obj.Code;


                var trHTML = '';
                $.each(obj.roles, function (i, item) {
                    trHTML += '<div class="col-sm-4 roo" id='+item.RoleName+'> <div class="alert alert-primary alert-important alert-sm ">  <strong>'+ item.RoleName +
                        '</strong> </div> </div>';
                });
                $('#StaffRoles').append(trHTML);

            }
        });
    }

    $(document).on('click', '.roo', function(){


//        var year = $(this).data('year');
//        var term = $(this).data('term');
//        var subjectid = $(this).data('subjectid');
//        var studentid = $(this).data('student_number');
//        var token = $(this).data('token');
//        var url = $(this).data('url');
//        console.log(gradeid);
//        console.log(studentid);
//        console.log(mark);
//        console.log(subjectid);
//        console.log(token);
//        console.log(url);
        //alert(total);

//        if (mark > -1){
//            if (mark < 101 )
//            {
//                insertMark(gradeid, subjectid, studentid,mark, token, url, year, term);
//                return;
//            }
//            else
//            {
//                alert("Student Mark cannot be greater than the total");
//                return false;
//            }
//
//        }
        return;
    });


    $(document).on('click', '.staff', function(){

        var staffid = $(this).data('StaffID');

        //alert(staffid);

//        var year = $(this).data('year');
//        var term = $(this).data('term');
//        var subjectid = $(this).data('subjectid');
//        var studentid = $(this).data('student_number');
//        var token = $(this).data('token');
//        var url = $(this).data('url');
//        console.log(gradeid);
//        console.log(studentid);
//        console.log(mark);
//        console.log(subjectid);
//        console.log(token);
//        console.log(url);
        //alert(total);

//        if (mark > -1){
//            if (mark < 101 )
//            {
//                insertMark(gradeid, subjectid, studentid,mark, token, url, year, term);
//                return;
//            }
//            else
//            {
//                alert("Student Mark cannot be greater than the total");
//                return false;
//            }
//
//        }
        return;
    });

    function insertMark(gradeid, subjectid, studentid, mark, token, url,year, term)
    {
        $.ajax({
            url : url,
            method : "POST",
            data : {gradeid : gradeid, subjectid : subjectid, studentid:studentid, _token: token, mark:mark,year:year, term:term },
            dataType : "text",
            success : function(data)
            {
                console.log(data);

            }
        });
    }

    $(document).on('blur', '.mid_marks', function(){
        var mark = $(this).text();
        var year = $(this).data('year');
        var studentid = $(this).data('studentid');
        var term = $(this).data('term');
        var grade = $(this).data('grade');
        var token = $(this).data('token');
        var url = $(this).data('url');
        var ARSID= $(this).data('sid');
        var setId = $(this).data('setname');
        var subject = $(this).data('subject');
        var total = 100;

        //console.log(setId);

        if (mark > -1){
            if (mark < total +1 )
            {
                insertMidTerm(mark, year, term, grade, studentid, token, url, ARSID, setId, subject)
                return;
            }
            else
            {
                alert("Student Mark cannot be greater than the total");
                return false;
            }
        }
        return;
    });


    $(document).on('blur', '.exam_marks', function(){
        var mark = $(this).text();
        var year = $(this).data('year');
        var studentid = $(this).data('studentid');
        var term = $(this).data('term');
        var grade = $(this).data('grade');
        var token = $(this).data('token');
        var url = $(this).data('url');
        var ARSID= $(this).data('sid');
        var setId = $(this).data('setname');
        var subject = $(this).data('subject');
        var total = 100;

        if (mark > -1){
            if (mark < total +1 )
            {
                insertExams(mark, year, term, grade, studentid, token, url, ARSID, setId, subject)
                return;
            }
            else
            {
                alert("Student Mark cannot be greater than the total");
                return false;
            }
        }
        return;
    });

    function insertExams(mark, year, term, grade, studentid, token, url, ARSID, setId, subject)
    {
        $.ajax({
            url : url,
            method : "POST",
            data : {mark : mark, year : year,  term : term,  grade : grade, studentid:studentid, _token: token, ARSID:ARSID, created_by:"{{Auth::user()->id}}", setId:setId, subject:subject},
            dataType : "text",
            success : function(data)
            {
                console.log(data);

            }
        });
    }

    function insertMidTerm(mark, year, term, grade, studentid, token, url, ARSID,setId, subject)
    {
        $.ajax({
            url : url,
            method : "POST",
            data : {mark : mark, year : year,  term : term,  grade : grade, studentid:studentid, _token: token, ARSID:ARSID, created_by:"{{Auth::user()->id}}", setId:setId, subject:subject},
            dataType : "text",
            success : function(data)
            {
                console.log(data);

            }
        });
    }

    $(document).on('blur', '.mid_grade', function(){
        var g = $(this).text();
        var year = $(this).data('year');
        var studentid = $(this).data('studentid');
        var term = $(this).data('term');
        var grade = $(this).data('grade');
        var token = $(this).data('token');
        var url = $(this).data('url');
        var ARSID= $(this).data('sid');
        var setId = $(this).data('setname');
        var subject = $(this).data('subject');
        var total = 100;

        insertGrade(g, year, term, grade, studentid, token, url, ARSID,setId, subject)
//        return;
//        if (mark > -1){
//            if (mark < total +1 )
//            {
//
//            }
//            else
//            {
//                alert("Student Mark cannot be greater than the total");
//                return false;
//            }
//        }
//        return;
    });

    function insertGrade(g, year, term, grade, studentid, token, url, ARSID, setId, subject)
    {
        $.ajax({
            url : url,
            method : "POST",
            data : {g : g, year : year,  term : term,  grade : grade, studentid:studentid, _token: token, ARSID:ARSID, created_by:"{{Auth::user()->id}}", setId:setId, subject:subject},
            dataType : "text",
            success : function(data)
            {
                console.log(data);

            }
        });
    }


    function getSubject(id, subject)
    {
        $("#assign .modal-body #grade_subject_id").val( id );
        $("#assign .modal-body #subject").val( subject );
    }

    function getMarital(id)
    {
        $("#dM .modal-body #idM").val( id );
        //$("#assign .modal-body #subject").val( subject );
    }

    function getStudent(student_id, studentname)
    {
        $("#payment .modal-body #student_id").val( student_id );
        $("#payment .modal-body #student").val( studentname );
    }

    function  getAssessmentDetails(subjectid, gradeid, subject, grade) {

        $("#addAssessment .modal-body #subject_id").val( subjectid );
        $("#addAssessment .modal-body #grade_id").val(  gradeid);
        $("#addAssessment .modal-header .modal-title").html('<i class="fa fa-book"></i> '+ 'Create Assessment for ' +grade + ' '+subject  );

    }



    function insertExam(mark, examid, studentid, token, url)
    {
        $.ajax({
            url : url,
            method : "POST",
            data : {mark : mark, assessmentid : examid, studentid:studentid, _token: token, created_by:"{{Auth::user()->id}}"},
            dataType : "text",
            success : function(data)
            {
                console.log(data);

            }
        });
    }




    function getmarks( examid, studentid, url)
    {
        $.ajax({
            url : url,
            method : "GET",
            data : { assessmentid : examid, studentid:studentid},
            dataType : "text",
            success : function(data)
            {
                console.log(data);
                document.getElementById(studentid).innerHTML = data;
            }
        });
    }

    function getEditSubjectGroup(id, OGName, AcYear, SubjID, SubjSelMin) {
        console.log(id);
        $("#editCreate .modal-body #OGID").val(id);
        $("#editCreate .modal-body #OGName").val(OGName);
        $("#editCreate .modal-body #AcYear").val(AcYear);
        $("#editCreate .modal-body #SubjSel").val(SubjID);
        $("#editCreate .modal-body #SubjSelMin").val(SubjSelMin);

    }

    function getActIDComment(id, comment) {
        $("#actcommentModal .modal-body #ASID").val(id);
        $("#actcommentModal .modal-header .modal-title").html("Meeeee");
        $("#actcommentModal .modal-body #comment").val(comment);
    }

    function getActComment() {

var skillsSelect = document.getElementById("actcommentSelector");
var selectedText = skillsSelect.options[skillsSelect.selectedIndex].text;

$("#actcommentModal .modal-body #comment").val(selectedText);

}

function getActStudents(id, url, ActName,count)
    {
        $('#actStudent tbody').html('');

        //console.log(url);
        // document.getElementById("SetName").innerHTML =  '';
         document.getElementById("ActID").innerHTML =  id;

         document.getElementById("ActName").innerHTML =  ActName;
        document.getElementById("Size").innerHTML =  count;

        $.ajax({
            url : url,
            method : "GET",
            data : {staffid : id, url: url},
            dataType : "text",
            success : function(data)
            {
                //console.log(data);
                //alert(url);
                var obj = JSON.parse(data);

                var trHTML = '';
                $.each(obj, function (i, item) {
                    //document.getElementById("Size").innerHTML =  item.Size;
                    //document.getElementById("SetName").innerHTML =  item.Class;
                    //document.getElementById("RowID").innerHTML =  item.RowID;
                    trHTML += '<tr><td>' + item.StudentID + '</td><td>' + item.Name + '</td><td>' + item.class +  '</td><td>' +'@if (Auth::user()->hasAnyRole(['Administrator','Activity - Admin']))' +'<a class="pull-right" title="Remove Student" onclick="rmv('+id+' ,'+item.StudentID+')"><i class="fa fa-trash"></i></a>' +'@endif'+ '</td></tr>';
                });
                $('#actStudent').append(trHTML);


            }
        });

    }
    function  rmv(id ,studentid) {
        if (confirm('Are You sure you want to remove Student from Activity'))
        {

            var url = '/xul/removeStudentActivity/'+id+'/'+studentid;
            //alert(url);
            //var cl = document.getElementById("RowID").innerHTML;

            alert(url);
            $.ajax({
                url : url,
                method : "GET",
                data : {StudentID : studentid, url: url},
                dataType : "text",
                success : function(data)
                {
//                    console.log(data);
//                    getClassStudent(cl, url1)
                }
            });
        }

    }

    function getActData() {
        var cl = document.getElementById("ActID").innerHTML;
        //alert(cl);
        if (cl != '')
        {
            // $("#addStudentSet .modal-header .modal-title").html( 'Add Students to '+cl+' Class' );
            $("#addActSet .modal-body #ActivityID").val( cl );
            //alert()
            //document.getElementById("ActivityID").innerHTML =  cl;
        }
        else
        {
            alert('Please Select an Activity Group First');
            return;
        }
    }

    function setactparamss(year, term) {
        //alert(year);
        $("#addGroup .modal-body #TermYear").val(year);
        $("#addGroup .modal-body #Term").val(term);
    }

    function editactparams(year, term ,ActID ,StaffID ,ActName,ActAbbr ) {
        //alert(year);
        $("#editActGroup .modal-body #TermYear").val(year);
        $("#editActGroup .modal-body #Term").val(term);
        $("#editActGroup .modal-body #ActID").val(ActID);
        $("#editActGroup .modal-body #ActName").val(ActName);
        $("#editActGroup .modal-body #ActAbbr").val(ActAbbr);
        $("#editActGroup .modal-body #tid").val(StaffID);



    }

</script>
