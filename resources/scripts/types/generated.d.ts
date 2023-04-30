declare namespace App.DataTransferObjects {
    export type SharedData = {
        user: App.DataTransferObjects.UserData | null
    }
    export type UserData = {
        name: string
        email: string
    }
}
