import axiosClient from '../axios';

export const ApiService = {
  // Filters can include: scope, grade, status, category_id
  getCompetitions(filters: Record<string, any> = {}) {
    return axiosClient.get('/competitions', { params: filters });
  },

  getCompetition(identifier: string | number) {
    return axiosClient.get(`/competitions/${identifier}`);
  },

  getEvents(filters: Record<string, any> = {}) {
    return axiosClient.get('/events', { params: filters });
  },

  getLeaderboard(limit: number = 10) {
    return axiosClient.get('/leaderboard', { params: { limit } });
  },

  getPosts(filters: Record<string, any> = {}) {
    return axiosClient.get('/blogs', { params: filters });
  },

  toggleBookmark(type: 'competition' | 'event', id: number) {
    return axiosClient.post('/bookmarks/toggle', { type, id });
  },

  getStudentProfile() {
    return axiosClient.get('/profile');
  },

  updateStudentProfile(data: Record<string, any>) {
    return axiosClient.post('/profile', data);
  },

  // Auth Methods
  login(data: Record<string, any>) {
    return axiosClient.post('/login', data);
  },
  
  register(data: Record<string, any>) {
    return axiosClient.post('/register', data);
  },

  forgotPassword(data: { email: string }) {
    return axiosClient.post('/forgot_password', data);
  },

  resetPassword(data: Record<string, any>) {
    return axiosClient.post('/reset_password', data);
  },

  // Social Auth
  getGoogleAuthUrl(): string {
    const base = import.meta.env.VITE_API_BASE_URL;
    const version = import.meta.env.VITE_API_CURRENT_VERSION;
    return `${base}/api/${version}/auth/google/redirect`;
  }
};
