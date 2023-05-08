<template>
  <v-row justify="center" align="center">
    <v-col class="shrink" style="min-width: 220px;">
        <v-text-field v-model="color" v-mask="mask" hide-details class="ma-0 pa-0" solo>
            <template v-slot:append>
                <v-menu v-model="menu" top nudge-bottom="105" nudge-left="16" :close-on-content-click="false">
                    <template v-slot:activator="{ on }">
                        <div :style="swatchStyle" v-on="on" />
                    </template>
                    <v-card>
                        <v-card-text class="pa-0">
                            <v-color-picker v-bind="$attrs"  flat />
                        </v-card-text>
                    </v-card>
                </v-menu>
            </template>
        </v-text-field>
    </v-col>
  </v-row>
</template>

<script>

export default {
  inheritAttrs: false,
  data () {
    return {
      mask: '!#XXXXXXXX',
      menu: false,
    }
  },
}
</script>