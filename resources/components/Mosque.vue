<template>
    <v-container fluid>
        <v-card class="mx-auto px-6 py-8">
            <v-card>
                <v-toolbar color="success" density="compact">
                    <v-toolbar-title>
                        Masjid
                    </v-toolbar-title>
                    <v-btn @click="modal = true">Tambah</v-btn>
                </v-toolbar>
                <v-card-text py-3>
                    <v-table>
                        <thead>
                            <tr>
                                <th class="text-left">Nama</th>
                                <th class="text-left">Sertifikat</th>
                                <th class="text-left">Luas</th>
                                <th class="text-left">Alamat</th>
                                <th class="text-left">RT</th>
                                <th class="text-left">RW</th>
                                <th class="text-left">Website</th>
                                <th class="text-left">Email</th>
                                <th class="text-right">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(item, index) of collection.administrative">
                                <tr .key="index">
                                    <td v-text="item.name"></td>
                                    <td v-text="item.certificate"></td>
                                    <td v-text="item.large"></td>
                                    <td v-text="item.address"></td>
                                    <td v-text="item.rt"></td>
                                    <td v-text="item.rw"></td>
                                    <td v-text="item.website"></td>
                                    <td v-text="item.email"></td>
                                    <td class="text-right">
                                        <v-btn @click="showMosqueDetail(item)" size="small" color="success">Detail
                                        </v-btn>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </v-table>
                </v-card-text>
            </v-card>
        </v-card>
        <v-dialog v-model="modal" persistent :overlay="false" max-width="500px" transition="dialog-transition"
            v-if="modal">
            <v-toolbar color="success">
                <v-toolbar-title>

                </v-toolbar-title>
            </v-toolbar>
            <v-card>
                <v-card-text>
                    <v-text-field variant="outlined" label="Nama"></v-text-field>
                    <v-select variant="outlined" label="Sertifikat" :items="['Aktif', 'Tidak Aktif']"></v-select>
                    <v-text-field variant="outlined" label="Luas"></v-text-field>
                    <v-text-field variant="outlined" label="Alamat"></v-text-field>
                    <v-text-field variant="outlined" label="RT"></v-text-field>
                    <v-text-field variant="outlined" label="RW"></v-text-field>
                    <v-text-field variant="outlined" label="Website"></v-text-field>
                    <v-text-field variant="outlined" label="Email"></v-text-field>
                    <v-btn @click="store" size="small" color="success">Kirim</v-btn>
                </v-card-text>
            </v-card>
        </v-dialog>

        <v-dialog v-model="dialog.mosque.detail" persistent :overlay="false" max-width="500px"
            transition="dialog-transition" v-if="dialog">
            <v-toolbar color="success">
                <v-toolbar-title v-if="selected.mosque !== null">
                    {{ selected.mosque.name }}
                </v-toolbar-title>
            </v-toolbar>
            <v-card>
                <v-card-text>
                    <v-row>
                        <v-col cols="4">
                            <v-list-subheader>Nama Imam</v-list-subheader>
                        </v-col>

                        <v-col cols="8">
                            <v-text-field variant="outlined" label=""></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="4">
                            <v-list-subheader>Nama Imam</v-list-subheader>
                        </v-col>
                        <v-col cols="8">
                            <v-text-field variant="outlined" label=""></v-text-field>
                        </v-col>
                    </v-row>
                    <v-btn @click="store" size="small" color="success">Kirim</v-btn>
                </v-card-text>
            </v-card>
        </v-dialog>

    </v-container>
</template>

<script>
export default {
    name: "Mosque",
    data() {
        return {
            modal: false,
            dialog: {
                mosque: {
                    create: false,
                    delete: false,
                    detail: false,
                }
            },
            collection: {
                administrative: [
                    {
                        name: "Masjid",
                        certificate: "-",
                        large: "-",
                        address: "Salatiga",
                        rt: "01",
                        rw: "03",
                        website: "-",
                        email: "-"
                    },
                ],
            },
            field: {
                user: {
                    mosque: null,
                    status: null,
                }
            },
            selected: {
                mosque: null
            }
        }
    },
    methods: {
        store() {
        },
        showMosqueDetail(item) {
            this.dialog.mosque.detail = true
            this.selected.mosque = item

        }
    },
    mounted() {
    },
}
</script>

<style scoped>

</style>
