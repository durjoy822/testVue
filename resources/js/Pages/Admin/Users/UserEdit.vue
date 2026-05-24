<script setup>
import { ref } from 'vue'
import AdminLayout from '../../../Layouts/Admin/AdminLayout.vue'
import { Link, useForm } from '@inertiajs/vue3'

defineOptions({
  layout: AdminLayout
})

const props = defineProps({
  user: Object
})

const avatarPreview = ref(
  props.user.avatar
    ? `/uploads/users/${props.user.avatar}`
    : null
)

const showPassword = ref(false)
const showConfirmPassword = ref(false)

const form = useForm({
  name: props.user.name || '',
  email: props.user.email || '',
  phone: props.user.phone || '',
  role: props.user.role || '',
  password: '',
  confirm_password: '',
  status: props.user.status || 'Active',
  address: props.user.address || '',
  joining_date: props.user.joining_date || '',
  avatar: null
})

function handleAvatar(e) {

  const file = e.target.files[0]

  if (!file) return

  form.avatar = file

  const reader = new FileReader()

  reader.onload = (ev) => {
    avatarPreview.value = ev.target.result
  }

  reader.readAsDataURL(file)
}

function removeAvatar() {

  form.avatar = null
  avatarPreview.value = null
}

function handleSubmit() {

  form.put(
    route('admin.dashboard.user_update', props.user.id),
    {
      forceFormData: true,

      onSuccess: () => {

        form.password = ''
        form.confirm_password = ''
      }
    }
  )
}

function handleReset() {

  form.reset()

  avatarPreview.value = props.user.avatar
    ? `/uploads/users/${props.user.avatar}`
    : null
}
</script>

<template>
  <div class="cu-wrapper">

    <!-- Top Header -->
    <div class="cu-topbar">

      <div>
        <h1 class="cu-page-title">Edit  User</h1>
      </div>

      <Link
        :href="route('admin.dashboard.users')"
        as="button"
        class="cu-btn-back"
      >
        <i class="fa-solid fa-arrow-left"></i>
        Back
      </Link>

    </div>

    <div class="cu-layout">

      <!-- Sidebar -->
      <div class="cu-sidebar">

        <!-- Avatar -->
        <div class="cu-card cu-avatar-card">

          <div class="cu-avatar-zone">

            <div v-if="!avatarPreview" class="cu-avatar-placeholder">
              <i class="fa-solid fa-camera"></i>
              <p>Upload Photo</p>
            </div>

            <div v-else class="cu-avatar-preview-wrap">
              <img :src="avatarPreview" class="cu-avatar-preview-img" />

              <button
                @click="removeAvatar"
                class="cu-avatar-remove"
              >
                <i class="fa-solid fa-trash"></i>
              </button>
            </div>

            <input
              type="file"
              accept="image/*"
              @change="handleAvatar"
              class="cu-avatar-input"
            />
          </div>

          <!-- Avatar Error -->
          <p v-if="form.errors.avatar" class="cu-field-error">
            {{ form.errors.avatar }}
          </p>

        </div>

      </div>

      <!-- Main -->
      <div class="cu-main">

        <div class="cu-card">

          <!-- Personal Information -->
          <div class="cu-section">

            <h3 class="cu-section-title">
              Personal Information
            </h3>

            <div class="cu-grid-2">

              <!-- Name -->
              <div class="cu-field">

                <label class="cu-label">
                  Full Name
                </label>

                <div
                  class="cu-input-wrap"
                  :class="{ 'cu-input-error': form.errors.name }"
                >
                  <i class="fa-solid fa-user cu-input-icon"></i>

                  <input
                    type="text"
                    class="cu-input"
                    v-model="form.name"
                    placeholder="Enter name"
                  />
                </div>

                <p v-if="form.errors.name" class="cu-field-error">
                  {{ form.errors.name }}
                </p>

              </div>

              <!-- Email -->
              <div class="cu-field">

                <label class="cu-label">
                  Email
                </label>

                <div
                  class="cu-input-wrap"
                  :class="{ 'cu-input-error': form.errors.email }"
                >
                  <i class="fa-solid fa-envelope cu-input-icon"></i>

                  <input
                    type="email"
                    class="cu-input"
                    v-model="form.email"
                    placeholder="Enter email"
                  />
                </div>

                <p v-if="form.errors.email" class="cu-field-error">
                  {{ form.errors.email }}
                </p>

              </div>

              <!-- Phone -->
              <div class="cu-field">

                <label class="cu-label">
                  Phone
                </label>

                <div
                  class="cu-input-wrap"
                  :class="{ 'cu-input-error': form.errors.phone }"
                >
                  <i class="fa-solid fa-phone cu-input-icon"></i>

                  <input
                    type="text"
                    class="cu-input"
                    v-model="form.phone"
                    placeholder="Enter phone"
                  />
                </div>

                <p v-if="form.errors.phone" class="cu-field-error">
                  {{ form.errors.phone }}
                </p>

              </div>

              <!-- Joining Date -->
              <div class="cu-field">

                <label class="cu-label">
                  Joining Date
                </label>

                <div
                  class="cu-input-wrap"
                  :class="{ 'cu-input-error': form.errors.joining_date }"
                >
                  <i class="fa-solid fa-calendar cu-input-icon"></i>

                  <input
                    type="date"
                    class="cu-input"
                    v-model="form.joining_date"
                  />
                </div>

                <p v-if="form.errors.joining_date" class="cu-field-error">
                  {{ form.errors.joining_date }}
                </p>

              </div>

            </div>

          </div>

          <!-- Role -->
          <div class="cu-section">

            <h3 class="cu-section-title">
              Role
            </h3>

            <div class="cu-field">

              <select
                v-model="form.role"
                class="cu-select"
                :class="{ 'cu-input-error': form.errors.role }"
              >
                <option value="">
                  Select Role
                </option>

                <option value="Admin">
                  Admin
                </option>

                <option value="HR Manager">
                  HR Manager
                </option>

                <option value="Employee">
                  Employee
                </option>
              </select>

              <p v-if="form.errors.role" class="cu-field-error">
                {{ form.errors.role }}
              </p>

            </div>

          </div>

          <!-- Security -->
          <div class="cu-section">

            <h3 class="cu-section-title">
              Security
            </h3>

            <div class="cu-grid-2">

              <!-- Password -->
              <div class="cu-field">

                <label class="cu-label">
                  Password
                </label>

                <div
                  class="cu-input-wrap"
                  :class="{ 'cu-input-error': form.errors.password }"
                >
                  <i class="fa-solid fa-lock cu-input-icon"></i>

                  <input
                    :type="showPassword ? 'text' : 'password'"
                    class="cu-input"
                    v-model="form.password"
                    placeholder="Password"
                  />

                  <button
                    type="button"
                    class="cu-eye-btn"
                    @click="showPassword = !showPassword"
                  >
                    <i
                      :class="[
                        'fa-solid',
                        showPassword ? 'fa-eye-slash' : 'fa-eye'
                      ]"
                    ></i>
                  </button>
                </div>

                <p v-if="form.errors.password" class="cu-field-error">
                  {{ form.errors.password }}
                </p>

              </div>

              <!-- Confirm Password -->
              <div class="cu-field">

                <label class="cu-label">
                  Confirm Password
                </label>

                <div
                  class="cu-input-wrap"
                  :class="{ 'cu-input-error': form.errors.confirm_password }"
                >
                  <i class="fa-solid fa-lock cu-input-icon"></i>

                  <input
                    :type="showConfirmPassword ? 'text' : 'password'"
                    class="cu-input"
                    v-model="form.confirm_password"
                    placeholder="Confirm Password"
                  />

                  <button
                    type="button"
                    class="cu-eye-btn"
                    @click="showConfirmPassword = !showConfirmPassword"
                  >
                    <i
                      :class="[
                        'fa-solid',
                        showConfirmPassword ? 'fa-eye-slash' : 'fa-eye'
                      ]"
                    ></i>
                  </button>
                </div>

                <p
                  v-if="form.errors.confirm_password"
                  class="cu-field-error"
                >
                  {{ form.errors.confirm_password }}
                </p>

              </div>

            </div>

          </div>

          <!-- Address -->
          <div class="cu-section">

            <h3 class="cu-section-title">
              Address
            </h3>

            <div class="cu-field">

              <textarea
                v-model="form.address"
                class="cu-textarea"
                :class="{ 'cu-input-error': form.errors.address }"
                placeholder="Enter address"
              ></textarea>

              <p v-if="form.errors.address" class="cu-field-error">
                {{ form.errors.address }}
              </p>

            </div>

          </div>

          <!-- Buttons -->
          <div class="cu-action-bar">

            <button
              class="cu-btn-reset"
              type="button"
              @click="handleReset"
            >
              Reset
            </button>

            <button
              class="cu-btn-submit"
              type="button"
              @click="handleSubmit"
              :disabled="form.processing"
            >

              <span v-if="form.processing">
                Saving...
              </span>

              <span v-else>
                Save User
              </span>

            </button>

          </div>

        </div>

      </div>

    </div>

  </div>
</template>

<style scoped>
.cu-wrapper{
  padding:24px;
  background:#f5f6fa;
  min-height:100vh;
}

.cu-topbar{
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin-bottom:20px;
}

.cu-page-title{
  font-size:28px;
  font-weight:700;
}

.cu-layout{
  display:grid;
  grid-template-columns:280px 1fr;
  gap:20px;
}

.cu-sidebar{
  display:flex;
  flex-direction:column;
  gap:20px;
}

.cu-main{
  width:100%;
}

.cu-card{
  background:#fff;
  border-radius:14px;
  padding:20px;
  border:1px solid #e5e7eb;
}

.cu-avatar-zone{
  position:relative;
  width:100%;
  height:260px;
  border:2px dashed #d1d5db;
  border-radius:12px;
  overflow:hidden;
}

.cu-avatar-placeholder{
  height:100%;
  display:flex;
  align-items:center;
  justify-content:center;
  flex-direction:column;
  gap:10px;
}

.cu-avatar-preview-img{
  width:100%;
  height:100%;
  object-fit:cover;
}

.cu-avatar-input{
  position:absolute;
  inset:0;
  opacity:0;
  cursor:pointer;
}

.cu-avatar-remove{
  position:absolute;
  top:10px;
  right:10px;
  width:40px;
  height:40px;
  border:none;
  border-radius:50%;
  background:red;
  color:#fff;
}

.cu-section{
  margin-bottom:30px;
}

.cu-section-title{
  font-size:18px;
  font-weight:700;
  margin-bottom:20px;
}

.cu-grid-2{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:20px;
}

.cu-field{
  display:flex;
  flex-direction:column;
  gap:8px;
}

.cu-label{
  font-size:14px;
  font-weight:600;
}

.cu-input-wrap{
  position:relative;
  display:flex;
  align-items:center;
  border:1.5px solid #d1d5db;
  border-radius:10px;
  overflow:hidden;
  background:#fff;
}

.cu-input{
  width:100%;
  height:48px;
  border:none;
  outline:none;
  padding:0 14px 0 44px;
}

.cu-input-icon{
  position:absolute;
  left:14px;
  color:#9ca3af;
}

.cu-select{
  height:48px;
  border-radius:10px;
  border:1.5px solid #d1d5db;
  padding:0 14px;
  outline:none;
}

.cu-textarea{
  min-height:120px;
  border-radius:10px;
  border:1.5px solid #d1d5db;
  padding:14px;
  outline:none;
}

.cu-eye-btn{
  position:absolute;
  right:14px;
  background:none;
  border:none;
  cursor:pointer;
  color:#9ca3af;
}

.cu-field-error{
  color:#ef4444;
  font-size:13px;
  font-weight:500;
}

.cu-input-error{
  border-color:#ef4444 !important;
  box-shadow:0 0 0 3px rgba(239,68,68,0.1);
}

.cu-action-bar{
  display:flex;
  justify-content:flex-end;
  gap:12px;
  margin-top:20px;
}

.cu-btn-submit{
  height:46px;
  padding:0 24px;
  border:none;
  border-radius:10px;
  background:#4f46e5;
  color:#fff;
  font-weight:600;
  cursor:pointer;
}

.cu-btn-reset{
  height:46px;
  padding:0 24px;
  border:none;
  border-radius:10px;
  background:#e5e7eb;
  cursor:pointer;
}

.cu-btn-back{
  height:42px;
  padding:0 20px;
  border:none;
  border-radius:10px;
  background:#4f46e5;
  color:#fff;
  display:flex;
  align-items:center;
  gap:8px;
  text-decoration:none;
}

@media(max-width:768px){

  .cu-layout{
    grid-template-columns:1fr;
  }

  .cu-grid-2{
    grid-template-columns:1fr;
  }
}
</style>