The new lead request has been received.Please contact him as soon as possible.

<table border="1px" >
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $lead['first_name'] }}</td>
            <td>{{ $lead['last_name'] }}</td>
            <td>{{ $lead['email'] }}</td>
            <td>{{ $lead['mobile'] }}</td>
            <td>{{ $lead['message'] }}</td>
        </tr>
</table>

