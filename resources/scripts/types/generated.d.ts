declare namespace App.DataTransferObjects {
export type SharedData = {
user: App.DataTransferObjects.UserData | null;
menu: Array<any>;
};
export type UserData = {
name: string;
email: string;
phone: string;
};
}
