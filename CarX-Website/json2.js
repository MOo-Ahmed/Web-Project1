function CreateTableFromJSON() {
    var codes = [] ;
    alert("hey");
    $.get("./json_data.json", function(data) {
    
        console.log(data);
        $.each( data.result, function( key, val ) {
            codes.push({name: data.result.name , code: data.result.code , states: data.result.states});
        });
    });
    
    var col = [];   // used to store the keys to make the table headings
    var indices = [] ;  // used to know the indices where we have states
    var sizes = [] ;
    for (var i = 0; i < codes.length; i++) {
        // First let's know how many keys we have
        var v = codes[i][Object.keys(codes[i])[Object.keys(codes[i]).length-1]] ;
        if(Array.isArray(v)){
            indices.push(i);
            sizes.push(v.length);
        }
        for (var key in codes[i]) {
            if (col.indexOf(key) === -1) {
                col.push(key);
            }
            
        }
    }
    var tmp = "";
    indices.forEach(function(entry) {
        tmp = tmp + entry + " , " ;
    });
    document.getElementById("try").innerHTML = tmp;
    tmp = "";
    sizes.forEach(function(entry) {
        document.getElementById("try2").innerHTML += entry + " , ";
    });
    
    /*
    document.getElementById("try").innerHTML = indices.toString;
    document.getElementById("try2").innerHTML = sizes.toString;
    */
    var table = document.createElement("table");
    table.setAttribute("id", "T1");
    //table.setAttribute("style", "max-width:100%;");
    table.className = 'table table-hover';
    var tr = table.insertRow(-1); // The -1 inserts new row at the last position                   
    var tr2 = table.insertRow(-1);
    //tr.rowSpan = "2";
    for (var i = 0; i < col.length; i++) {
        var th = document.createElement("th");    
        th.innerHTML = col[i];
        tr.appendChild(th);
    }

    for (var i = 0; i < codes.length; i++) {
        if(indices.indexOf(i) !== -1){
            var v = codes[i].states ;
            var s = sizes[indices.indexOf(i)];
            // Then we should make rowspan by sizes[i]
            tr = table.insertRow(-1);
            //tr.rowSpan = sizes[i];
            tr.rowSpan = s;
            for (var j = 0; j < col.length-1; j++) {
                var tabCell = tr.insertCell(-1);
                
                tabCell.innerHTML = codes[i][col[j]];
            }
            var states = tr.insertCell(-1);
            for(var k = 0 ; k < s; k++){
                
                var tmp = document.createElement("td");
                //states.appendChild(tmp);
                if(k != 0)  tr.appendChild(tmp);
                var name = v[k].name ;
                var code = v[k].code ;
                var td = document.createElement("td");
                var td2 = document.createElement("td");
                td.innerHTML = name;
                td2.innerHTML = code ;
                tr.appendChild(td);
                tr.appendChild(td2);
                tr = table.insertRow(-1);
                var states = tr.insertCell(-1);
                var states = tr.insertCell(-1);
            }
        }
        
        else{
            tr = table.insertRow(-1);
            for (var j = 0; j < col.length; j++) {
                var tabCell = tr.insertCell(-1);
                tabCell.innerHTML = codes[i][col[j]];
            }
        }
    }
    var divContainer = document.getElementById("showData");
    divContainer.appendChild(table);
}