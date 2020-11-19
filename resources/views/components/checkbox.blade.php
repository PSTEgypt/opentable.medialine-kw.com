

<tr>
        <th>{{$title}}</th>
        
        <th>
        <input type="checkbox" 
             form="formAdmin" style="text-align: center;" 
              name="add{{$name}}" value='1' > </th>
        <th><input type="checkbox" form="formAdmin" style="text-align: center;" 
             name="edit{{$name}}" value='1' > </th>
        <th><input type="checkbox" form="formAdmin"
             style="text-align: center;"  value='1' name="delete{{$name}}" > </th>
        </tr>