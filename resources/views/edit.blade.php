<style>
    .form-container {
    width: 80%;
    margin: 0 auto;
}

.form-container table {
    width: 100%;
}

.form-container table tr {
    margin-bottom: 20px;
}

.form-container table td {
    padding: 10px;
}

.form-container table label {
    font-weight: bold;
}

.form-container table input[type="text"],
.form-container table input[type="number"],
.form-container table textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-container table input[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-container table input[type="submit"]:hover {
    background-color: #45a049;
}

</style>
<div class="form-container">
    <fieldset>

   <legend>Modifier Offer</legend>
<form action="{{ route('offer.update',$offer->id) }}" method="post">
            @csrf
            @method('PUT');
            <table>
                <tr>
                    <td>
                    <label>Title:</label></td>
                    <td><input type="text"  name="title" value="{{ $offer->title }}"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>Description:</label></td>
                    <td><textarea name="description" rows="4" cols="50" >{{ $offer->description }}</textarea><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>Salary:</label></td>
                    <td><input type="number" name="salary" value="{{ $offer->salary }}"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>Location:</label></td>
                    <td><input type="text" name="location" value="{{ $offer->location }}"><br><br>
                    </td>
                </tr>  
                <tr>
                    <td>
                    <label>Type:</label></td>
                    <td><input type="text" name="type" value="{{ $offer->type }}"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                    <input class="button" type="submit" value="Modifier" /></td>
                </tr>
            </table>
        </form>
        </fieldset>
        </div>