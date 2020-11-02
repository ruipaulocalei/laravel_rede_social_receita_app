<template>
  <div>
    <span
      class="like-btn"
      @click="likeReceita"
      :class="{ 'like-active': isActive }"
    ></span>

    <p>{{ likeNumber }} gostos</p>
  </div>
</template>

<script>
export default {
  props: ["receitaId", "like", "likes"],
  //   mounted() {
  //     console.log(this.like);
  //   },
  data: function () {
    return {
      isActive: this.like,
      totalLikes: this.likes,
    };
  },
  methods: {
    likeReceita() {
      axios
        .post("/receita/" + this.receitaId)
        .then((response) => {
          if (response.data.attached.length > 0) {
            this.$data.totalLikes++;
          } else {
            this.$data.totalLikes--;
          }

          this.isActive = !this.isActive;
        })
        .catch((error) => {
          if (error.response.status === 401) window.location = "/register";
        });
    },
  },

  computed: {
    likeNumber: function () {
      return this.totalLikes;
    },
  },
};
</script>
