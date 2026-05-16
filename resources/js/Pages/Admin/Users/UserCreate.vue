<script setup>
import { ref } from 'vue'
import AdminLayout from '../../../Layouts/Admin/AdminLayout.vue'
import { Link } from '@inertiajs/vue3'

defineOptions({
  layout: AdminLayout
})

const form = ref({
  name: '',
  email: '',
  phone: '',
  role: '',
  password: '',
  confirm_password: '',
  status: 'Active',
  address: '',
  joining_date: '',
  avatar: null
})

const avatarPreview = ref(null)
const showPassword = ref(false)
const showConfirmPassword = ref(false)

function handleAvatar(e) {
  const file = e.target.files[0]
  if (!file) return
  form.value.avatar = file
  const reader = new FileReader()
  reader.onload = (ev) => { avatarPreview.value = ev.target.result }
  reader.readAsDataURL(file)
}

function removeAvatar() {
  form.value.avatar = null
  avatarPreview.value = null
}

function handleSubmit() {
  console.log('Form submitted:', form.value)
}

function handleReset() {
  Object.assign(form.value, {
    name: '', email: '', phone: '', role: '',
    password: '', confirm_password: '',
    status: 'Active', address: '', joining_date: '', avatar: null
  })
  avatarPreview.value = null
}
</script>

<template>
  <div class="cu-wrapper">

    <!-- Top Header Bar -->
    <div class="cu-topbar">
      <div class="cu-topbar-left">
        <h1 class="cu-page-title">Create New User</h1>
        <div class="cu-breadcrumb">
          <span class="cu-breadcrumb-link">Dashboard</span>
          <i class="fa-solid fa-chevron-right cu-breadcrumb-sep"></i>
          <span class="cu-breadcrumb-link">Users</span>
          <i class="fa-solid fa-chevron-right cu-breadcrumb-sep"></i>
          <span class="cu-breadcrumb-current">Create</span>
        </div>
      </div>

    <Link 
  :href="route('admin.dashboard.users')" 
  as="button"
  class="cu-btn-back"
>
  <i class="fa-solid fa-arrow-left"></i>
  <span>Back</span>
</Link>

    </div>

    <div class="cu-layout">

      <!-- Left Column: Avatar + Quick Info -->
      <div class="cu-sidebar">

        <!-- Avatar Upload -->
        <div class="cu-card cu-avatar-card">
          <div class="cu-avatar-label">Profile Photo</div>

          <div class="cu-avatar-zone">
            <div v-if="!avatarPreview" class="cu-avatar-placeholder">
              <div class="cu-avatar-icon-ring">
                <i class="fa-solid fa-camera cu-avatar-icon"></i>
              </div>
              <p class="cu-avatar-hint">Click to upload photo</p>
              <p class="cu-avatar-hint2">PNG, JPG up to 2MB</p>
            </div>
            <div v-else class="cu-avatar-preview-wrap">
              <img :src="avatarPreview" alt="Avatar Preview" class="cu-avatar-preview-img" />
              <div class="cu-avatar-overlay">
                <button @click="removeAvatar" class="cu-avatar-remove">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>
            </div>
            <input type="file" accept="image/*" @change="handleAvatar" class="cu-avatar-input" />
          </div>

          <!-- Quick Status Toggle -->
          <div class="cu-status-toggle-wrap">
            <div class="cu-toggle-label">
              <span>Account Status</span>
              <span :class="['cu-status-pill', form.status === 'Active' ? 'active' : 'inactive']">
                {{ form.status }}
              </span>
            </div>
            <label class="cu-toggle-switch">
              <input
                type="checkbox"
                :checked="form.status === 'Active'"
                @change="form.status = $event.target.checked ? 'Active' : 'Inactive'"
              />
              <span class="cu-toggle-track">
                <span class="cu-toggle-thumb"></span>
              </span>
            </label>
          </div>
        </div>

        <!-- Role Card -->
        <div class="cu-card cu-role-card">
          <div class="cu-role-card-title">Assign Role</div>
          <div class="cu-role-options">
            <label
              v-for="r in ['Admin', 'HR Manager', 'Employee']"
              :key="r"
              :class="['cu-role-option', form.role === r ? 'selected' : '']"
            >
              <input type="radio" :value="r" v-model="form.role" class="cu-role-radio" />
              <i :class="['fa-solid', r === 'Admin' ? 'fa-shield-halved' : r === 'HR Manager' ? 'fa-briefcase' : 'fa-user', 'cu-role-icon']"></i>
              <div class="cu-role-info">
                <span class="cu-role-name">{{ r }}</span>
                <span class="cu-role-desc">
                  {{ r === 'Admin' ? 'Full access' : r === 'HR Manager' ? 'HR modules' : 'Standard access' }}
                </span>
              </div>
              <i v-if="form.role === r" class="fa-solid fa-circle-check cu-role-check"></i>
            </label>
          </div>
        </div>

      </div>

      <!-- Right Column: Main Form -->
      <div class="cu-main">
        <div class="cu-card">

          <!-- Section: Personal Info -->
          <div class="cu-section">
            <div class="cu-section-head">
              <div class="cu-section-icon-wrap">
                <i class="fa-solid fa-user cu-section-icon"></i>
              </div>
              <div>
                <div class="cu-section-title">Personal Information</div>
                <div class="cu-section-sub">Basic identity details</div>
              </div>
            </div>

            <div class="cu-grid-2">

              <div class="cu-field">
                <label class="cu-label">
                  Full Name
                  <span class="cu-required">*</span>
                </label>
                <div class="cu-input-wrap">
                  <i class="fa-solid fa-user cu-input-icon"></i>
                  <input
                    type="text"
                    class="cu-input"
                    placeholder="e.g. John Doe"
                    v-model="form.name"
                  />
                </div>
              </div>

              <div class="cu-field">
                <label class="cu-label">
                  Email Address
                  <span class="cu-required">*</span>
                </label>
                <div class="cu-input-wrap">
                  <i class="fa-solid fa-envelope cu-input-icon"></i>
                  <input
                    type="email"
                    class="cu-input"
                    placeholder="john@example.com"
                    v-model="form.email"
                  />
                </div>
              </div>

              <div class="cu-field">
                <label class="cu-label">Phone Number</label>
                <div class="cu-input-wrap">
                  <i class="fa-solid fa-phone cu-input-icon"></i>
                  <input
                    type="text"
                    class="cu-input"
                    placeholder="+880 1XXX-XXXXXX"
                    v-model="form.phone"
                  />
                </div>
              </div>

              <div class="cu-field">
                <label class="cu-label">Joining Date</label>
                <div class="cu-input-wrap">
                  <i class="fa-solid fa-calendar-days cu-input-icon"></i>
                  <input
                    type="date"
                    class="cu-input"
                    v-model="form.joining_date"
                  />
                </div>
              </div>

            </div>
          </div>

          <div class="cu-divider"></div>

          <!-- Section: Security -->
          <div class="cu-section">
            <div class="cu-section-head">
              <div class="cu-section-icon-wrap teal">
                <i class="fa-solid fa-lock cu-section-icon"></i>
              </div>
              <div>
                <div class="cu-section-title">Security</div>
                <div class="cu-section-sub">Set login credentials</div>
              </div>
            </div>

            <div class="cu-grid-2">

              <div class="cu-field">
                <label class="cu-label">
                  Password
                  <span class="cu-required">*</span>
                </label>
                <div class="cu-input-wrap">
                  <i class="fa-solid fa-key cu-input-icon"></i>
                  <input
                    :type="showPassword ? 'text' : 'password'"
                    class="cu-input cu-input-pw"
                    placeholder="Min. 8 characters"
                    v-model="form.password"
                  />
                  <button type="button" class="cu-eye-btn" @click="showPassword = !showPassword">
                    <i :class="['fa-solid', showPassword ? 'fa-eye-slash' : 'fa-eye']"></i>
                  </button>
                </div>
              </div>

              <div class="cu-field">
                <label class="cu-label">
                  Confirm Password
                  <span class="cu-required">*</span>
                </label>
                <div class="cu-input-wrap">
                  <i class="fa-solid fa-shield-halved cu-input-icon"></i>
                  <input
                    :type="showConfirmPassword ? 'text' : 'password'"
                    class="cu-input cu-input-pw"
                    placeholder="Re-enter password"
                    v-model="form.confirm_password"
                  />
                  <button type="button" class="cu-eye-btn" @click="showConfirmPassword = !showConfirmPassword">
                    <i :class="['fa-solid', showConfirmPassword ? 'fa-eye-slash' : 'fa-eye']"></i>
                  </button>
                </div>
                <p v-if="form.confirm_password && form.password !== form.confirm_password" class="cu-field-error">
                  <i class="fa-solid fa-circle-exclamation"></i> Passwords do not match
                </p>
              </div>

            </div>
          </div>

          <div class="cu-divider"></div>

          <!-- Section: Address -->
          <div class="cu-section">
            <div class="cu-section-head">
              <div class="cu-section-icon-wrap amber">
                <i class="fa-solid fa-location-dot cu-section-icon"></i>
              </div>
              <div>
                <div class="cu-section-title">Address</div>
                <div class="cu-section-sub">User's physical location</div>
              </div>
            </div>

            <div class="cu-field">
              <label class="cu-label">Full Address</label>
              <textarea
                class="cu-textarea"
                rows="3"
                placeholder="House no, Street, City, Country..."
                v-model="form.address"
              ></textarea>
            </div>
          </div>

        </div>

        <!-- Action Bar -->
        <div class="cu-action-bar">
          <button class="cu-btn-reset" type="button" @click="handleReset">
            <i class="fa-solid fa-rotate-left"></i>
            Reset Form
          </button>

          <div class="cu-action-right">
            <button class="cu-btn-cancel" type="button">
              Cancel
            </button>

            <button class="cu-btn-submit" type="button" @click="handleSubmit">
              <i class="fa-solid fa-floppy-disk"></i>
              Save User
            </button>
          </div>
        </div>

      </div>
    </div>

  </div>
</template>

<style scoped>
/* ========== Base ========== */
.cu-wrapper {
  padding: 28px 28px 40px;
  min-height: 100vh;
  background: #f5f6fa;
  font-family: 'Segoe UI', system-ui, sans-serif;
}

/* ========== Topbar ========== */
.cu-topbar {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 16px;
  flex-wrap: wrap;
  margin-bottom: 28px;
}

.cu-breadcrumb {
  display: flex;
  align-items: center;
  gap: 6px;
  margin-bottom: 6px;
}

.cu-breadcrumb-link {
  font-size: 13px;
  color: #6b7280;
  cursor: pointer;
  transition: color .2s;
}

.cu-breadcrumb-link:hover { color: #4f46e5; }

.cu-breadcrumb-sep { font-size: 10px; color: #d1d5db; }

.cu-breadcrumb-current {
  font-size: 13px;
  color: #4f46e5;
  font-weight: 600;
}

.cu-page-title {
  font-size: 26px;
  font-weight: 800;
  color: #111827;
  margin: 0 0 4px;
  letter-spacing: -0.5px;
}

.cu-page-sub {
  font-size: 14px;
  color: #6b7280;
  margin: 0;
}

.cu-btn-back {
  display: flex;
  align-items: center;
  gap: 8px;
  height: 42px;
  padding: 0 18px;
  border-radius: 10px;
  border: 1.5px solid #e5e7eb;
  background: #6608f1;
  color: #e0e5ec;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: all .2s;
  white-space: nowrap;
  flex-shrink: 0;
}

.cu-btn-back:hover {
  border-color: #4f46e5;
  color: #4f46e5;
  background: #f5f3ff;
}

/* ========== Layout ========== */
.cu-layout {
  display: grid;
  grid-template-columns: 280px 1fr;
  gap: 20px;
  align-items: start;
}

@media (max-width: 900px) {
  .cu-layout { grid-template-columns: 1fr; }
}

/* ========== Card ========== */
.cu-card {
  background: #fff;
  border-radius: 16px;
  border: 1px solid #eaecf0;
  box-shadow: 0 1px 3px rgba(0,0,0,0.06);
  overflow: hidden;
}

/* ========== Sidebar ========== */
.cu-sidebar {
  display: flex;
  flex-direction: column;
  gap: 20px;
  position: sticky;
  top: 24px;
}

/* Avatar Card */
.cu-avatar-card {
  padding: 24px;
}

.cu-avatar-label {
  font-size: 13px;
  font-weight: 700;
  color: #374151;
  text-transform: uppercase;
  letter-spacing: .6px;
  margin-bottom: 16px;
}

.cu-avatar-zone {
  position: relative;
  width: 100%;
  aspect-ratio: 1;
  border-radius: 12px;
  border: 2px dashed #d1d5db;
  background: #f9fafb;
  overflow: hidden;
  cursor: pointer;
  transition: border-color .2s, background .2s;
}

.cu-avatar-zone:hover {
  border-color: #4f46e5;
  background: #f5f3ff;
}

.cu-avatar-placeholder {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100%;
  padding: 20px;
  text-align: center;
}

.cu-avatar-icon-ring {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: #ede9fe;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 12px;
}

.cu-avatar-icon {
  font-size: 22px;
  color: #7c3aed;
}

.cu-avatar-hint {
  font-size: 14px;
  font-weight: 600;
  color: #374151;
  margin: 0 0 4px;
}

.cu-avatar-hint2 {
  font-size: 12px;
  color: #9ca3af;
  margin: 0;
}

.cu-avatar-preview-wrap {
  position: relative;
  width: 100%;
  height: 100%;
}

.cu-avatar-preview-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.cu-avatar-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.4);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity .2s;
}

.cu-avatar-zone:hover .cu-avatar-overlay { opacity: 1; }

.cu-avatar-remove {
  background: #ef4444;
  color: #fff;
  border: none;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  font-size: 14px;
  cursor: pointer;
}

.cu-avatar-input {
  position: absolute;
  inset: 0;
  opacity: 0;
  cursor: pointer;
  width: 100%;
  height: 100%;
}

/* Status Toggle */
.cu-status-toggle-wrap {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 20px;
  padding-top: 20px;
  border-top: 1px solid #f3f4f6;
}

.cu-toggle-label {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.cu-toggle-label span:first-child {
  font-size: 13px;
  font-weight: 600;
  color: #374151;
}

.cu-status-pill {
  font-size: 11px;
  font-weight: 700;
  padding: 2px 10px;
  border-radius: 100px;
  letter-spacing: .3px;
}

.cu-status-pill.active {
  background: #dcfce7;
  color: #15803d;
}

.cu-status-pill.inactive {
  background: #fee2e2;
  color: #dc2626;
}

.cu-toggle-switch { position: relative; cursor: pointer; }
.cu-toggle-switch input { position: absolute; opacity: 0; width: 0; height: 0; }

.cu-toggle-track {
  display: block;
  width: 46px;
  height: 26px;
  border-radius: 100px;
  background: #e5e7eb;
  transition: background .3s;
  position: relative;
}

.cu-toggle-switch input:checked + .cu-toggle-track {
  background: #4f46e5;
}

.cu-toggle-thumb {
  position: absolute;
  top: 3px;
  left: 3px;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #fff;
  box-shadow: 0 1px 3px rgba(0,0,0,0.2);
  transition: transform .3s;
}

.cu-toggle-switch input:checked + .cu-toggle-track .cu-toggle-thumb {
  transform: translateX(20px);
}

/* Role Card */
.cu-role-card {
  padding: 20px;
}

.cu-role-card-title {
  font-size: 13px;
  font-weight: 700;
  color: #374151;
  text-transform: uppercase;
  letter-spacing: .6px;
  margin-bottom: 14px;
}

.cu-role-options {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.cu-role-option {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 14px;
  border-radius: 10px;
  border: 1.5px solid #e5e7eb;
  cursor: pointer;
  transition: all .2s;
  position: relative;
}

.cu-role-option:hover {
  border-color: #c7d2fe;
  background: #faf5ff;
}

.cu-role-option.selected {
  border-color: #4f46e5;
  background: #f5f3ff;
}

.cu-role-radio {
  position: absolute;
  opacity: 0;
  width: 0;
}

.cu-role-icon {
  font-size: 16px;
  color: #6b7280;
  width: 20px;
  text-align: center;
}

.cu-role-option.selected .cu-role-icon { color: #4f46e5; }

.cu-role-info {
  flex: 1;
  display: flex;
  flex-direction: column;
}

.cu-role-name {
  font-size: 14px;
  font-weight: 600;
  color: #111827;
}

.cu-role-desc {
  font-size: 12px;
  color: #9ca3af;
  margin-top: 1px;
}

.cu-role-option.selected .cu-role-name { color: #4f46e5; }

.cu-role-check {
  font-size: 16px;
  color: #4f46e5;
}

/* ========== Main Form ========== */
.cu-main {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.cu-section {
  padding: 24px 28px;
}

.cu-section-head {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 22px;
}

.cu-section-icon-wrap {
  width: 42px;
  height: 42px;
  border-radius: 10px;
  background: #ede9fe;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.cu-section-icon-wrap.teal { background: #ccfbf1; }
.cu-section-icon-wrap.amber { background: #fef9c3; }

.cu-section-icon {
  font-size: 16px;
  color: #7c3aed;
}

.cu-section-icon-wrap.teal .cu-section-icon { color: #0f766e; }
.cu-section-icon-wrap.amber .cu-section-icon { color: #d97706; }

.cu-section-title {
  font-size: 16px;
  font-weight: 700;
  color: #111827;
}

.cu-section-sub {
  font-size: 13px;
  color: #9ca3af;
  margin-top: 2px;
}

.cu-grid-2 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 18px;
}

@media (max-width: 600px) {
  .cu-grid-2 { grid-template-columns: 1fr; }
}

.cu-divider {
  height: 1px;
  background: #f3f4f6;
  margin: 0 20px;
}

/* Fields */
.cu-field { display: flex; flex-direction: column; gap: 8px; }

.cu-label {
  font-size: 13px;
  font-weight: 600;
  color: #374151;
}

.cu-required { color: #ef4444; margin-left: 2px; }

.cu-input-wrap {
  position: relative;
  display: flex;
  align-items: center;
  border: 1.5px solid #e5e7eb;
  border-radius: 10px;
  background: #fff;
  overflow: hidden;
  transition: border-color .2s, box-shadow .2s;
}

.cu-input-wrap:focus-within {
  border-color: #4f46e5;
  box-shadow: 0 0 0 3px rgba(79,70,229,0.1);
}

.cu-input-icon {
  font-size: 14px;
  color: #9ca3af;
  padding: 0 0 0 14px;
  flex-shrink: 0;
  pointer-events: none;
}

.cu-input {
  flex: 1;
  height: 46px;
  border: none;
  background: transparent;
  font-size: 14px;
  color: #111827;
  padding: 0 14px;
  outline: none;
}

.cu-input::placeholder { color: #c4c9d4; }

.cu-input-pw { padding-right: 44px; }

.cu-eye-btn {
  position: absolute;
  right: 12px;
  background: none;
  border: none;
  color: #9ca3af;
  cursor: pointer;
  font-size: 15px;
  padding: 4px;
  display: flex;
  align-items: center;
  transition: color .2s;
}

.cu-eye-btn:hover { color: #4f46e5; }

.cu-field-error {
  font-size: 12px;
  color: #ef4444;
  display: flex;
  align-items: center;
  gap: 5px;
  margin: 0;
}

.cu-textarea {
  width: 100%;
  border: 1.5px solid #e5e7eb;
  border-radius: 10px;
  font-size: 14px;
  color: #111827;
  padding: 12px 14px;
  outline: none;
  resize: none;
  font-family: inherit;
  transition: border-color .2s, box-shadow .2s;
  box-sizing: border-box;
}

.cu-textarea:focus {
  border-color: #4f46e5;
  box-shadow: 0 0 0 3px rgba(79,70,229,0.1);
}

.cu-textarea::placeholder { color: #c4c9d4; }

/* ========== Action Bar ========== */
.cu-action-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
  background: #fff;
  padding: 16px 24px;
  border-radius: 14px;
  border: 1px solid #eaecf0;
  box-shadow: 0 1px 3px rgba(0,0,0,0.06);
}

.cu-action-right {
  display: flex;
  align-items: center;
  gap: 10px;
}

.cu-btn-reset {
  display: flex;
  align-items: center;
  gap: 7px;
  height: 42px;
  padding: 0 18px;
  border-radius: 9px;
  border: 1.5px solid #e5e7eb;
  background: transparent;
  color: #6b7280;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: all .2s;
}

.cu-btn-reset:hover {
  border-color: #d1d5db;
  color: #374151;
  background: #f9fafb;
}

.cu-btn-cancel {
  height: 42px;
  padding: 0 18px;
  border-radius: 9px;
  border: 1.5px solid #e5e7eb;
  background: transparent;
  color: #374151;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: all .2s;
}

.cu-btn-cancel:hover {
  background: #f9fafb;
  border-color: #d1d5db;
}

.cu-btn-submit {
  display: flex;
  align-items: center;
  gap: 8px;
  height: 42px;
  padding: 0 24px;
  border-radius: 9px;
  border: none;
  background: #4f46e5;
  color: #fff;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: all .2s;
  box-shadow: 0 2px 8px rgba(79,70,229,0.35);
}

.cu-btn-submit:hover {
  background: #4338ca;
  box-shadow: 0 4px 14px rgba(79,70,229,0.45);
  transform: translateY(-1px);
}

.cu-btn-submit:active {
  transform: translateY(0);
}
</style>