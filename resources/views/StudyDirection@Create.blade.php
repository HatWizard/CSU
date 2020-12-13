@extends('layouts.documentForm')
@section('requestPage')



<div class="container" style="height: 1000px">
    <div id="example-table">
    </div>
</div>
<script>
var dateEditor = function(cell, onRendered, success, cancel){
    //cell - the cell component for the editable cell
    //onRendered - function to call when the editor has been rendered
    //success - function to call to pass the successfuly updated value to Tabulator
    //cancel - function to call to abort the edit and return to a normal cell

    //create and style input
    var cellValue = moment(cell.getValue(), "DD/MM/YYYY").format("YYYY-MM-DD"),
    input = document.createElement("input");

    input.setAttribute("type", "date");

    input.style.padding = "4px";
    input.style.width = "100%";
    input.style.boxSizing = "border-box";

    input.value = cellValue;

    onRendered(function(){
        input.focus();
        input.style.height = "100%";
    });

    function onChange(){
        if(input.value != cellValue){
            success(moment(input.value, "YYYY-MM-DD").format("DD/MM/YYYY"));
        }else{
            cancel();
        }
    }

    //submit new value on blur or change
    input.addEventListener("change", onChange);
    input.addEventListener("blur", onChange);

    //submit new value on enter
    input.addEventListener("keydown", function(e){
        if(e.keyCode == 13){
            onChange();
        }

        if(e.keyCode == 27){
            cancel();
        }
    });

    return input;
};

//create autocomplete editor (example of using jquery code to create an editor)
var autocompEditor = function(cell, onRendered, success, cancel){
    //create and style input
    var input = $("<input type='text'/>");

    //setup jquery autocomplete
    input.autocomplete({
        source: ["United Kingdom", "Germany", "France", "USA", "Canada", "Russia", "India", "China", "South Korea", "Japan"]
    });

    input.css({
        "padding":"4px",
        "width":"100%",
        "box-sizing":"border-box",
    })
    .val(cell.getValue());

    onRendered(function(){
        input.focus();
        input.css("height","100%");
    });

    //submit new value on blur
    input.on("change blur", function(e){
        if(input.val() != cell.getValue()){
            success(input.val());
        }else{
            cancel();
        }
    });

    //submit new value on enter
    input.on("keydown", function(e){
        if(e.keyCode == 13){
            success(input.val());
        }

        if(e.keyCode == 27){
            cancel();
        }
    });

    return input[0];
};

var tableData = [
    {name:"Hi", location: 0, progress: 0, gender:0, rating : 0, dob:"", car:""}
]

//Build Tabulator
$("#example-table").tabulator({
    height:"311px",
    data: tableData,
    columns:[
        {title:"Name", field:"name", width:150, editor:"input"},
        {title:"Location", field:"location", width:130, editor:autocompEditor},
        {title:"Progress", field:"progress", sorter:"number", align:"left", formatter:"progress", width:140, editor:true},
        {title:"Gender", field:"gender", editor:"select", editorParams:{"male":"Male", "female":"Female"}},
        {title:"Rating", field:"rating",  formatter:"star", align:"center", width:100, editor:true},
        {title:"Date Of Birth", field:"dob", align:"center", sorter:"date", editor:dateEditor},
        {title:"Driver", field:"car", align:"center", editor:true, formatter:"tickCross"},
    ],
});
</script>
@endsection

