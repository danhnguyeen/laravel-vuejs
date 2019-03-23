<template>
  <div
    class="modal fade"
    id="loginModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
        <h5 class="text-uppercase text-center">Login</h5>
        <br>
        <br>

        <form v-on:submit.prevent="attemptLogin()">
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              placeholder="Email"
              name="email"
              v-model="email"
            >
          </div>

          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" v-model="password">
          </div>

          <div class="form-group flexbox py-10">
            <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" v-model="remember">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Remember me</span>
            </label>

            <a class="text-muted hover-primary fs-13" href="#">Forgot password?</a>
          </div>

          <div class="form-group">
            <button class="btn btn-bold btn-block btn-primary" :disabled="!isValidForm" type="submit">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      email: "",
      password: "",
      remember: true
    };
  },
  methods: {
    async attemptLogin() {
      const res = await axios.post('login', { name: this.email, password: this.password });
      console.log(res)
      location.reload();
    }
  },
  computed: {
    isValidForm() {
      return this.email && this.password;
    }
  },

  mounted() {
    console.log("Component mounted.");
  }
};
</script>
