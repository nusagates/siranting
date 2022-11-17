<template>
    <v-container fluid>
        <v-card class="mx-auto px-6 py-8">
            <v-card>
                <v-toolbar color="success" density="compact">
                    <v-toolbar-title>
                        Companies
                    </v-toolbar-title>
                    <v-btn @click="modal = true">Tambah</v-btn>
                </v-toolbar>
                <v-card-text py-3>
                    <v-table>
                        <thead>
                            <tr>
                                <th class="text-left">Nama</th>
                                <th class="text-left">Email</th>
                                <th class="text-left">No HP</th>
                                <th class="text-left">Alamat</th>
                                <th class="text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(item, index) of collection.companies">
                                <tr .key="index">
                                    <td v-text="item.name"></td>
                                    <td v-text="item.email"></td>
                                    <td v-text="item.phone"></td>
                                    <td v-text="item.address"></td>
                                    <td v-text="item.status"></td>
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
                    <v-text-field variant="outlined" label="Email"></v-text-field>
                    <v-text-field variant="outlined" label="No HP"></v-text-field>
                    <v-text-field variant="outlined" label="Alamat"></v-text-field>
                    <v-select variant="outlined" label="Status" :items="['Aktif', 'Tidak Aktif']"></v-select>
                    <v-btn @click="store" size="small" color="success">Kirim</v-btn>
                </v-card-text>
            </v-card>
        </v-dialog>

    </v-container>
</template>

<script>
export default {
    name: "Companies",
    data() {
        return {
            modal: false,
            dialog: {
                company: {
                    create: false,
                    delete: false,
                    detail: false,
                }
            },
            collection: {
                companies: [
                    {
                        name: "Company",
                        email: "-",
                        phone: "-",
                        address: "-",
                        status: "Aktif"
                    },
                ],
            },
            field: {
                user: {
                    company: null,
                    status: null,
                }
            },
            selected: {
                company: null
            }
        }
    },
    methods: {
        store() {
        },
        showCompanyDetail(item) {
            this.dialog.company.detail = true
            this.selected.company = item

        }
    },
    mounted() {
    },
}
</script>

<style scoped>

</style>
