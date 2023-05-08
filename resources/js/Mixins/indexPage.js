import axios from 'axios'
export const indexPageMixin = {
  data () {
    return {
        items: [],
    }
  },
  created() {
    this.items = this.$page['props']['items']
  },
  methods: {
    destroy(route) {
      axios.delete(route).then((response) => {
        
      })
    }
  }
}
