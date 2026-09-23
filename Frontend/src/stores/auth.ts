import { defineStore } from 'pinia';
import { ApiService } from '../services/api';
import axiosClient from '../axios';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null as any | null,
    profile: null as any | null,
    loading: false,
    // Modal state
    showModal: false,
    modalTab: 'login' as 'login' | 'register',
    // Where to redirect after login (for context preservation)
    redirectAfterLogin: null as string | null,
  }),
  getters: {
    isAuthenticated: (state) => !!state.user,
  },
  actions: {
    openModal(tab: 'login' | 'register' = 'login', redirectTo?: string) {
      this.modalTab = tab;
      this.redirectAfterLogin = redirectTo || null;
      this.showModal = true;
      document.body.style.overflow = 'hidden';
    },
    closeModal() {
      this.showModal = false;
      document.body.style.overflow = '';
    },
    async fetchUser() {
      this.loading = true;
      try {
        const response = await axiosClient.get('/user');
        this.user = response.data;
        
        // Also fetch profile if authenticated
        const profileResponse = await ApiService.getStudentProfile();
        this.profile = profileResponse.data;
      } catch (error) {
        this.user = null;
        this.profile = null;
      } finally {
        this.loading = false;
      }
    },
    async logout() {
      try {
        await axiosClient.post('/logout');
      } catch {}
      this.user = null;
      this.profile = null;
      localStorage.removeItem('auth_token');
    }
  }
});
