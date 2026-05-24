<script setup>
import { ref } from 'vue'
import AdminLayout from '../../../Layouts/Admin/AdminLayout.vue'
import { Link } from '@inertiajs/vue3'

defineOptions({
  layout: AdminLayout
})

const props = defineProps({
  users: Array
})

const selectedUser = ref({})

const openModal = (user) => {

  selectedUser.value = user

  const modal = new bootstrap.Modal(
    document.getElementById('userViewModal')
  )

  modal.show()
}
</script>

<template>
  <div class="container-fluid py-3">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h4 class="fw-bold mb-0">Users List</h4>
        <small class="text-muted">
          Manage all users information
        </small>
      </div>

      <Link :href="route('admin.dashboard.user_create')">
        <button class="btn btn-primary rounded-pill px-3">
          <i class="fa-solid fa-plus"></i>
          Add User
        </button>
      </Link>
    </div>

    <!-- Card -->
    <div class="card border-0 shadow-sm rounded-4">
      <div class="card-body">

        <!-- Top Filter -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">

          <div class="d-flex gap-2">
            <select class="form-select">
              <option>All Role</option>
              <option>Admin</option>
              <option>HR Manager</option>
              <option>Employee</option>
            </select>

            <select class="form-select">
              <option>All Status</option>
              <option>Active</option>
              <option>Inactive</option>
            </select>
          </div>

          <div>
            <input type="search" class="form-control" placeholder="Search user...">
          </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
          <table class="table align-middle table-hover custom-table mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>User</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Status</th>
                <th>Joined</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>

            <tbody>

              <tr v-for="(user, index) in users" :key="user.id">

                <td>{{ index + 1 }}</td>

                <td>
                  <div class="d-flex align-items-center gap-2">

                    <div class="user-avatar">
                      {{ user.name?.charAt(0) }}
                    </div>

                    <div>

                      <div class="fw-semibold">
                        {{ user.name }}
                      </div>

                      <small class="text-muted">
                        {{ user.email }}
                      </small>

                    </div>

                  </div>
                </td>

                <td>{{ user.phone }}</td>

                <td>
                  {{ user.role }}
                </td>

                <td>
                  {{ user.status }}
                </td>

                <td>
                  {{ user.joining_date }}
                </td>

                <td class="text-center">

                  <button class="btn btn-sm btn-light border me-2" @click="openModal(user)">
                    <i class="fa-solid fa-eye"></i>
                  </button>

                    <Link  :href="route('admin.dashboard.user_edit', user.id)" class="btn btn-sm btn-light border" >
                       <i class="fa fa-solid fa-edit"></i>
                    </Link>

                 <link rel="stylesheet" href=""> 

                </td>

              </tr>

            </tbody>
          </table>
        </div>

      </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="userViewModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4">

          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold">
              User Details
            </h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body p-4">

            <div class="text-center mb-4">
              <div class="profile-avatar mx-auto mb-3">
                {{ selectedUser.name?.charAt(0) }}
              </div>

              <h4 class="fw-bold mb-1">
                {{ selectedUser.name }}
              </h4>

              <p class="text-muted mb-0">
                {{ selectedUser.email }}
              </p>
            </div>

            <div class="row g-3">

              <div class="col-md-6">
                <div class="info-card">
                  <small>Phone Number</small>
                  <h6>{{ selectedUser.phone }}</h6>
                </div>
              </div>

              <div class="col-md-6">
                <div class="info-card">
                  <small>Role</small>
                  <h6>{{ selectedUser.role }}</h6>
                </div>
              </div>

              <div class="col-md-6">
                <div class="info-card">
                  <small>Status</small>
                  <h6>{{ selectedUser.status }}</h6>
                </div>
              </div>

              <div class="col-md-6">
                <div class="info-card">
                  <small>Joined Date</small>
                  <h6>{{ selectedUser.joining_date }}</h6>
                </div>
              </div>

            </div>

          </div>

          <div class="modal-footer border-0 pt-0">
            <button class="btn btn-light border rounded-pill px-4" data-bs-dismiss="modal">
              Close
            </button>

            <button class="btn btn-primary rounded-pill px-4">
              Update User
            </button>
          </div>

        </div>
      </div>
    </div>

  </div>
</template>

<style scoped>
.custom-table thead th {
  background: #f8f9fc;
  font-size: 13px;
  font-weight: 600;
  color: #6c757d;
  padding: 14px;
  border-bottom: 1px solid #edf0f5;
}

.custom-table tbody td {
  padding: 14px;
  vertical-align: middle;
  border-bottom: 1px solid #f1f3f7;
}

.user-avatar {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  background: linear-gradient(135deg, #4f46e5, #7c3aed);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
}

.profile-avatar {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  background: linear-gradient(135deg, #4f46e5, #7c3aed);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 32px;
  font-weight: 700;
}

.info-card {
  background: #f8f9fc;
  border-radius: 16px;
  padding: 18px;
}

.info-card small {
  display: block;
  color: #6c757d;
  margin-bottom: 6px;
}

.info-card h6 {
  margin: 0;
  font-weight: 700;
}
</style>