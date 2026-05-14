<script setup>
import AdminLayout from '../../Layouts/Admin/AdminLayout.vue';

defineOptions({ layout: AdminLayout });

// your other logic here
</script>

<template>
<table class="table table-bordered  table-hover table-striped bg-white text-dark my-3">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>phone</th>
      <th>password</th>
      <th>created date</th>
      <th>actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>John Doe</td>
      <td>john.doe@example.com</td>
      <td>123-456-7890</td>
      <td>********</td>
      <td>2023-01-01</td>
      <td>
        <button class="btn btn-sm btn-primary">Edit</button>
        <button class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
    <tr>
      <td>John Doe</td>
      <td>john.doe@example.com</td>
      <td>123-456-7890</td>
      <td>********</td>
      <td>2023-01-01</td>
      <td>
        <button class="btn btn-sm btn-primary">Edit</button>
        <button class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
    <tr>
      <td>John Doe</td>
      <td>john.doe@example.com</td>
      <td>123-456-7890</td>
      <td>********</td>
      <td>2023-01-01</td>
      <td>
        <button class="btn btn-sm btn-primary">Edit</button>
        <button class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
    <tr>
      <td>John Doe</td>
      <td>john.doe@example.com</td>
      <td>123-456-7890</td>
      <td>********</td>
      <td>2023-01-01</td>
      <td>
        <button class="btn btn-sm btn-primary">Edit</button>
        <button class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
</template>