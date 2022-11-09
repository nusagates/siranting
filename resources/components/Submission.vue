<template>
    <v-container fluid>
        <v-card
    class="mx-auto"
    max-width="500"
  >
    <v-toolbar color="success" density="compact"> 
    <v-toolbar-title>
        <v-avatar
        color="success"
        size="24"
        v-text="step"
        ></v-avatar>
    </v-toolbar-title>
    </v-toolbar>

    <v-window v-model="step">
      <v-window-item :value="1">
        <v-card-text>
          <v-text-field
            variant="outlined"
            label="NIK">
        </v-text-field>
        <v-text-field
            variant="outlined"
            label="Nama">
        </v-text-field>
        <v-select
            variant="outlined"
            label="Jenis Kelamin" :items="['Laki-laki','Perempuan']">
        </v-select>
        <v-text-field
            variant="outlined"
            label="Tempat Lahir">
        </v-text-field>
        <v-text-field
            variant="outlined"
            label="Tanggal Lahir">
        </v-text-field>
        </v-card-text>
      </v-window-item>

      <v-window-item :value="2">
        <v-card-text>
          <v-text-field
            variant="outlined"
            label="Alamat"
          ></v-text-field>
          <v-text-field
            variant="outlined"
            label="RT"
          ></v-text-field>
          <v-text-field
            variant="outlined"
            label="RW"
          ></v-text-field>
          <v-text-field
            variant="outlined"
            label="Kodepos"
          ></v-text-field>
        </v-card-text>
      </v-window-item>

      <v-window-item :value="3">
        <v-card-text>
        <v-select
            variant="outlined" label="Pendidikan" :items="['SD','SMP','SMA/SMK']">
        </v-select>
        <v-select
            variant="outlined" label="Pekerjaan" :items="['Laki-laki','Perempuan']">
        </v-select>
        <v-select
            variant="outlined" label="Penghasilan" :items="['Laki-laki','Perempuan']">
        </v-select>
        <v-select
            variant="outlined" label="Golongan Darah" :items="['A','B','AB','O']">
        </v-select>
        </v-card-text>
      </v-window-item>

      <v-window-item :value="4">
        <v-card-text>
        <v-text-field
             variant="outlined"
             label="Nomor HP/WA"
        ></v-text-field>
        <v-text-field
             variant="outlined"
             label="Akun FB"
        ></v-text-field>
        <v-text-field
             variant="outlined"
             label="Email"
        ></v-text-field>
        </v-card-text>
      </v-window-item>

      <v-window-item :value="5">
        <v-card-text>
            <div class="text-subtitle-1 text-medium-emphasis">Foto Diri(Wajah)</div>
            <v-file-input clearable label="File input" variant="outlined"></v-file-input>
            <div class="text-subtitle-1 text-medium-emphasis">Foto KTP</div>
            <v-file-input clearable label="File input" variant="outlined"></v-file-input>
        </v-card-text>
      </v-window-item>
    </v-window>

    <v-divider></v-divider>

    <v-card-actions>
      <v-btn
        v-if="step > 1"
        variant="text"
        @click="step--"
      >
        Back
      </v-btn>
      <v-spacer></v-spacer>
      <v-btn
        v-if="step < 5"
        color="success"
        variant="flat"
        @click="step++"
      >
        Next
      </v-btn>
    </v-card-actions>
  </v-card>
    </v-container>
</template>

<script>
import Toast from "./helpers/Toast.vue";
export default {
    name: "Submission",
    components: {Toast},
    data() {
        return {
            step:1,
            computed: {
      currentTitle () {
        switch (this.step) {
          case 1: return 'Sign-up'
          case 2: return 'Create a password'
          default: return 'Account created'
        }
    }
},

            collection: {},
            field: {
                user:{
                    email: null,
                    password: null,
                    showPassword:false
                }
            },
            loading: {
                submit: false
            },
        }
    },
    methods: {
        login(){
            this.loading.submit=true
            axios.post('/api/v1/login', this.field.user).then(res=>{
                if(res.data.code===200){
                    this.$refs.message.show(res.data.message)
                }else{
                    this.$refs.message.show(res.data.message, 'warning')
                }
            }).finally(()=>{
                this.loading.submit=false
            })
        }
    },
}
</script>

<style scoped>

</style>
