<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th class="center" style="width: 2%;">No</th>
            <th class="center">Photo</th>
            <th>Kh Name</th>
            <th>En Name</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th >Generation</th>
            <th>Classroom</th>
            <th style="width:20%; !important;" class="center">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php $i=1;?>
            @foreach($st as $stu)
                <td style="line-height: 50px;" class="center">{{$i++}}</td>
                <td class="center"><img src='{{asset("photo/students/$stu->photo")}}' alt="no image" style="background: white;border:2px solid #00A6C7;border-radius: 50px;padding:1px;height: 50px; width: 50px;"></td>
                <td style="line-height: 50px; font-family:'Khmer OS System',Serif;">{{$stu->khName}}</td>
                <td style="line-height: 50px;">{{$stu->enName}}</td>
                <td style="line-height: 50px;">{{($stu->gender==0 ? 'Female': 'Male')}}</td>
                <td style="line-height: 50px;">{{$stu->phoneNum}}</td>
                <td style="line-height: 50px;">{{$stu->generation->name}}</td>
                <td style="line-height: 50px;">
                    @foreach($stu->classrooms as $cr)
                        <span class="label label-default">{{$cr->name}}</span>
                    @endforeach
                </td>
                <td style="line-height: 50px" class="center">


                    <a href="#" onclick='editStudent("{{$stu->id}}")' style="padding: 5px;" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-edit" style="color: #F8BC02;"></i></a>
                    <a href="#" style="padding: 5px;" onclick='deleteStudent("{{$stu->id}}")'><i class="fa fa-trash" style="color: red;" title="Delete"></i></a>
                    <a href="{{url('admin/student/view',$stu->id)}}" style="padding: 5px;"><i class="fa fa-eye" title="View" style="color: #03CBEA;"></i></a>

                </td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>