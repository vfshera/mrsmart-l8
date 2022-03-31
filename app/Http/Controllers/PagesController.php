<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use Litespeed\LSCache\LSCache;

class PagesController extends Controller
{
    public function index()
    {

        $services = json_decode(json_encode([
            [
                "name" => "Dry Cleaning",
                "icon" => "<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 30 30' fill='#00FF9A'>
                <path d='M24,4H6C4.895,4,4,4.895,4,6v18c0,1.105,0.895,2,2,2h18c1.105,0,2-0.895,2-2V6C26,4.895,25.105,4,24,4z M12,15l-1,3l-1-3 l-3-1l3-1l1-3l1,3l3,1L12,15z M21.333,21.333L20.5,23l-0.833-1.667L18,20.5l1.667-0.833L20.5,18l0.833,1.667L23,20.5L21.333,21.333z M22,10l-1,2l-1-2l-2-1l2-1l1-2l1,2l2,1L22,10z' fill='#00FF9A' />
              </svg>",
            ],
            [
                "name" => "Carpet Cleaning",
                "icon" => "<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 80 80' fill='#0076C4'>
                <path d='M11 10C9.632813 10 8.617188 11.042969 7.984375 12.3125C7.351563 13.578125 7 15.207031 7 17C7 18.792969 7.351563 20.421875 7.984375 21.6875C8.617188 22.957031 9.632813 24 11 24L11 68C11 68.550781 11.449219 69 12 69C12.550781 69 13 68.550781 13 68L18 68C18 68.550781 18.449219 69 19 69C19.550781 69 20 68.550781 20 68L25 68C25 68.550781 25.449219 69 26 69C26.550781 69 27 68.550781 27 68L32 68C32 68.550781 32.449219 69 33 69C33.550781 69 34 68.550781 34 68L39 68C39 68.550781 39.449219 69 40 69C40.550781 69 41 68.550781 41 68L46 68C46 68.550781 46.449219 69 47 69C47.550781 69 48 68.550781 48 68L53 68C53 68.550781 53.449219 69 54 69C54.550781 69 55 68.550781 55 68L60 68C60 68.550781 60.449219 69 61 69C61.550781 69 62 68.550781 62 68L67 68C67 68.550781 67.449219 69 68 69C68.550781 69 69 68.550781 69 68L69 24C70.367188 24 71.382813 22.957031 72.015625 21.6875C72.648438 20.421875 73 18.792969 73 17C73 15.207031 72.648438 13.578125 72.015625 12.3125C71.382813 11.042969 70.367188 10 69 10 Z M 11 12L69 12C69.289063 12 69.773438 12.300781 70.226563 13.203125C70.679688 14.109375 71 15.476563 71 17C71 18.523438 70.679688 19.890625 70.226563 20.796875C69.773438 21.699219 69.289063 22 69 22L11 22C10.710938 22 10.226563 21.699219 9.773438 20.796875C9.320313 19.890625 9 18.523438 9 17C9 15.476563 9.320313 14.109375 9.773438 13.203125C10.226563 12.300781 10.710938 12 11 12 Z M 13 24L67 24L67 66L13 66 Z M 62 24C61.449219 24 61 24.449219 61 25C61 25.550781 61.449219 26 62 26C62.550781 26 63 25.550781 63 25C63 24.449219 62.550781 24 62 24 Z M 18 24C17.449219 24 17 24.449219 17 25C17 25.550781 17.449219 26 18 26C18.550781 26 19 25.550781 19 25C19 24.449219 18.550781 24 18 24 Z M 37 25C36.449219 25 36 25.449219 36 26C36 26.550781 36.449219 27 37 27C37.550781 27 38 26.550781 38 26C38 25.449219 37.550781 25 37 25 Z M 43 25C42.449219 25 42 25.449219 42 26C42 26.550781 42.449219 27 43 27C43.550781 27 44 26.550781 44 26C44 25.449219 43.550781 25 43 25 Z M 18 28C17.449219 28 17 28.449219 17 29C17 29.550781 17.449219 30 18 30C18.550781 30 19 29.550781 19 29C19 28.449219 18.550781 28 18 28 Z M 34 28C33.449219 28 33 28.449219 33 29C33 29.550781 33.449219 30 34 30C34.550781 30 35 29.550781 35 29C35 28.449219 34.550781 28 34 28 Z M 46 28C45.449219 28 45 28.449219 45 29C45 29.550781 45.449219 30 46 30C46.550781 30 47 29.550781 47 29C47 28.449219 46.550781 28 46 28 Z M 62 28C61.449219 28 61 28.449219 61 29C61 29.550781 61.449219 30 62 30C62.550781 30 63 29.550781 63 29C63 28.449219 62.550781 28 62 28 Z M 31 31C30.449219 31 30 31.449219 30 32C30 32.550781 30.449219 33 31 33C31.550781 33 32 32.550781 32 32C32 31.449219 31.550781 31 31 31 Z M 40 31C39.449219 31 39 31.449219 39 32C39 32.550781 39.449219 33 40 33C40.550781 33 41 32.550781 41 32C41 31.449219 40.550781 31 40 31 Z M 49 31C48.449219 31 48 31.449219 48 32C48 32.550781 48.449219 33 49 33C49.550781 33 50 32.550781 50 32C50 31.449219 49.550781 31 49 31 Z M 18 32C17.449219 32 17 32.449219 17 33C17 33.550781 17.449219 34 18 34C18.550781 34 19 33.550781 19 33C19 32.449219 18.550781 32 18 32 Z M 62 32C61.449219 32 61 32.449219 61 33C61 33.550781 61.449219 34 62 34C62.550781 34 63 33.550781 63 33C63 32.449219 62.550781 32 62 32 Z M 28 34C27.449219 34 27 34.449219 27 35C27 35.550781 27.449219 36 28 36C28.550781 36 29 35.550781 29 35C29 34.449219 28.550781 34 28 34 Z M 37 34C36.449219 34 36 34.449219 36 35C36 35.550781 36.449219 36 37 36C37.550781 36 38 35.550781 38 35C38 34.449219 37.550781 34 37 34 Z M 43 34C42.449219 34 42 34.449219 42 35C42 35.550781 42.449219 36 43 36C43.550781 36 44 35.550781 44 35C44 34.449219 43.550781 34 43 34 Z M 52 34C51.449219 34 51 34.449219 51 35C51 35.550781 51.449219 36 52 36C52.550781 36 53 35.550781 53 35C53 34.449219 52.550781 34 52 34 Z M 18 36C17.449219 36 17 36.449219 17 37C17 37.550781 17.449219 38 18 38C18.550781 38 19 37.550781 19 37C19 36.449219 18.550781 36 18 36 Z M 62 36C61.449219 36 61 36.449219 61 37C61 37.550781 61.449219 38 62 38C62.550781 38 63 37.550781 63 37C63 36.449219 62.550781 36 62 36 Z M 31 37C30.449219 37 30 37.449219 30 38C30 38.550781 30.449219 39 31 39C31.550781 39 32 38.550781 32 38C32 37.449219 31.550781 37 31 37 Z M 40 37C39.449219 37 39 37.449219 39 38C39 38.550781 39.449219 39 40 39C40.550781 39 41 38.550781 41 38C41 37.449219 40.550781 37 40 37 Z M 49 37C48.449219 37 48 37.449219 48 38C48 38.550781 48.449219 39 49 39C49.550781 39 50 38.550781 50 38C50 37.449219 49.550781 37 49 37 Z M 18 40C17.449219 40 17 40.449219 17 41C17 41.550781 17.449219 42 18 42C18.550781 42 19 41.550781 19 41C19 40.449219 18.550781 40 18 40 Z M 34 40C33.449219 40 33 40.449219 33 41C33 41.550781 33.449219 42 34 42C34.550781 42 35 41.550781 35 41C35 40.449219 34.550781 40 34 40 Z M 46 40C45.449219 40 45 40.449219 45 41C45 41.550781 45.449219 42 46 42C46.550781 42 47 41.550781 47 41C47 40.449219 46.550781 40 46 40 Z M 62 40C61.449219 40 61 40.449219 61 41C61 41.550781 61.449219 42 62 42C62.550781 42 63 41.550781 63 41C63 40.449219 62.550781 40 62 40 Z M 37 43C36.449219 43 36 43.449219 36 44C36 44.550781 36.449219 45 37 45C37.550781 45 38 44.550781 38 44C38 43.449219 37.550781 43 37 43 Z M 43 43C42.449219 43 42 43.449219 42 44C42 44.550781 42.449219 45 43 45C43.550781 45 44 44.550781 44 44C44 43.449219 43.550781 43 43 43 Z M 18 44C17.449219 44 17 44.449219 17 45C17 45.550781 17.449219 46 18 46C18.550781 46 19 45.550781 19 45C19 44.449219 18.550781 44 18 44 Z M 62 44C61.449219 44 61 44.449219 61 45C61 45.550781 61.449219 46 62 46C62.550781 46 63 45.550781 63 45C63 44.449219 62.550781 44 62 44 Z M 40 46C39.449219 46 39 46.449219 39 47C39 47.550781 39.449219 48 40 48C40.550781 48 41 47.550781 41 47C41 46.449219 40.550781 46 40 46 Z M 18 48C17.449219 48 17 48.449219 17 49C17 49.550781 17.449219 50 18 50C18.550781 50 19 49.550781 19 49C19 48.449219 18.550781 48 18 48 Z M 26 48C25.449219 48 25 48.449219 25 49C25 49.550781 25.449219 50 26 50C26.550781 50 27 49.550781 27 49C27 48.449219 26.550781 48 26 48 Z M 54 48C53.449219 48 53 48.449219 53 49C53 49.550781 53.449219 50 54 50C54.550781 50 55 49.550781 55 49C55 48.449219 54.550781 48 54 48 Z M 62 48C61.449219 48 61 48.449219 61 49C61 49.550781 61.449219 50 62 50C62.550781 50 63 49.550781 63 49C63 48.449219 62.550781 48 62 48 Z M 18 52C17.449219 52 17 52.449219 17 53C17 53.550781 17.449219 54 18 54C18.550781 54 19 53.550781 19 53C19 52.449219 18.550781 52 18 52 Z M 26 52C25.449219 52 25 52.449219 25 53C25 53.550781 25.449219 54 26 54C26.550781 54 27 53.550781 27 53C27 52.449219 26.550781 52 26 52 Z M 30 52C29.449219 52 29 52.449219 29 53C29 53.550781 29.449219 54 30 54C30.550781 54 31 53.550781 31 53C31 52.449219 30.550781 52 30 52 Z M 50 52C49.449219 52 49 52.449219 49 53C49 53.550781 49.449219 54 50 54C50.550781 54 51 53.550781 51 53C51 52.449219 50.550781 52 50 52 Z M 54 52C53.449219 52 53 52.449219 53 53C53 53.550781 53.449219 54 54 54C54.550781 54 55 53.550781 55 53C55 52.449219 54.550781 52 54 52 Z M 62 52C61.449219 52 61 52.449219 61 53C61 53.550781 61.449219 54 62 54C62.550781 54 63 53.550781 63 53C63 52.449219 62.550781 52 62 52 Z M 18 56C17.449219 56 17 56.449219 17 57C17 57.550781 17.449219 58 18 58C18.550781 58 19 57.550781 19 57C19 56.449219 18.550781 56 18 56 Z M 62 56C61.449219 56 61 56.449219 61 57C61 57.550781 61.449219 58 62 58C62.550781 58 63 57.550781 63 57C63 56.449219 62.550781 56 62 56 Z M 18 60C17.449219 60 17 60.449219 17 61C17 61.550781 17.449219 62 18 62C18.550781 62 19 61.550781 19 61C19 60.449219 18.550781 60 18 60 Z M 22 60C21.449219 60 21 60.449219 21 61C21 61.550781 21.449219 62 22 62C22.550781 62 23 61.550781 23 61C23 60.449219 22.550781 60 22 60 Z M 26 60C25.449219 60 25 60.449219 25 61C25 61.550781 25.449219 62 26 62C26.550781 62 27 61.550781 27 61C27 60.449219 26.550781 60 26 60 Z M 30 60C29.449219 60 29 60.449219 29 61C29 61.550781 29.449219 62 30 62C30.550781 62 31 61.550781 31 61C31 60.449219 30.550781 60 30 60 Z M 34 60C33.449219 60 33 60.449219 33 61C33 61.550781 33.449219 62 34 62C34.550781 62 35 61.550781 35 61C35 60.449219 34.550781 60 34 60 Z M 38 60C37.449219 60 37 60.449219 37 61C37 61.550781 37.449219 62 38 62C38.550781 62 39 61.550781 39 61C39 60.449219 38.550781 60 38 60 Z M 42 60C41.449219 60 41 60.449219 41 61C41 61.550781 41.449219 62 42 62C42.550781 62 43 61.550781 43 61C43 60.449219 42.550781 60 42 60 Z M 46 60C45.449219 60 45 60.449219 45 61C45 61.550781 45.449219 62 46 62C46.550781 62 47 61.550781 47 61C47 60.449219 46.550781 60 46 60 Z M 50 60C49.449219 60 49 60.449219 49 61C49 61.550781 49.449219 62 50 62C50.550781 62 51 61.550781 51 61C51 60.449219 50.550781 60 50 60 Z M 54 60C53.449219 60 53 60.449219 53 61C53 61.550781 53.449219 62 54 62C54.550781 62 55 61.550781 55 61C55 60.449219 54.550781 60 54 60 Z M 58 60C57.449219 60 57 60.449219 57 61C57 61.550781 57.449219 62 58 62C58.550781 62 59 61.550781 59 61C59 60.449219 58.550781 60 58 60 Z M 62 60C61.449219 60 61 60.449219 61 61C61 61.550781 61.449219 62 62 62C62.550781 62 63 61.550781 63 61C63 60.449219 62.550781 60 62 60 Z M 12 71C11.449219 71 11 71.449219 11 72C11 72.550781 11.449219 73 12 73C12.550781 73 13 72.550781 13 72C13 71.449219 12.550781 71 12 71 Z M 19 71C18.449219 71 18 71.449219 18 72C18 72.550781 18.449219 73 19 73C19.550781 73 20 72.550781 20 72C20 71.449219 19.550781 71 19 71 Z M 26 71C25.449219 71 25 71.449219 25 72C25 72.550781 25.449219 73 26 73C26.550781 73 27 72.550781 27 72C27 71.449219 26.550781 71 26 71 Z M 33 71C32.449219 71 32 71.449219 32 72C32 72.550781 32.449219 73 33 73C33.550781 73 34 72.550781 34 72C34 71.449219 33.550781 71 33 71 Z M 40 71C39.449219 71 39 71.449219 39 72C39 72.550781 39.449219 73 40 73C40.550781 73 41 72.550781 41 72C41 71.449219 40.550781 71 40 71 Z M 47 71C46.449219 71 46 71.449219 46 72C46 72.550781 46.449219 73 47 73C47.550781 73 48 72.550781 48 72C48 71.449219 47.550781 71 47 71 Z M 54 71C53.449219 71 53 71.449219 53 72C53 72.550781 53.449219 73 54 73C54.550781 73 55 72.550781 55 72C55 71.449219 54.550781 71 54 71 Z M 61 71C60.449219 71 60 71.449219 60 72C60 72.550781 60.449219 73 61 73C61.550781 73 62 72.550781 62 72C62 71.449219 61.550781 71 61 71 Z M 68 71C67.449219 71 67 71.449219 67 72C67 72.550781 67.449219 73 68 73C68.550781 73 69 72.550781 69 72C69 71.449219 68.550781 71 68 71Z' fill='#0076C4' />
              </svg>",
            ],
            [
                "name" => "House Cleaning",
                "icon" => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48"><polygon fill="#d9d9d9" points="38.953,42 9.048,42 9.048,20.956 24,9.986 38.953,20.956"/><rect width="5.342" height="9.794" x="11.167" y="9.307" fill="#d9d9d9"/><radialGradient id="VxYXfMpjN4dLgpTpFrg7Pa" cx="31.611" cy="30.451" r="9.785" gradientTransform="matrix(.878 0 0 1.1705 2.642 -5.19)" gradientUnits="userSpaceOnUse"><stop offset=".021" stop-color="#d9813f"/><stop offset=".283" stop-color="#c57036"/><stop offset=".74" stop-color="#a75729"/><stop offset="1" stop-color="#9c4d24"/></radialGradient><rect width="9.274" height="15.976" x="25.759" y="22.462" fill="url(#VxYXfMpjN4dLgpTpFrg7Pa)"/><path fill="#754d33" d="M35.424,38.884H25.368V22.017h10.056V38.884z M26.15,37.993h8.493V22.908H26.15V37.993z"/><rect width="7.123" height="2.671" x="10.277" y="6.636" fill="#eb4b1a"/><radialGradient id="VxYXfMpjN4dLgpTpFrg7Pb" cx="16.659" cy="26.611" r="5.781" gradientUnits="userSpaceOnUse"><stop offset=".117" stop-color="#adf5ff"/><stop offset=".247" stop-color="#a7f2ff"/><stop offset=".427" stop-color="#95eaff"/><stop offset=".636" stop-color="#7df"/><stop offset=".867" stop-color="#4ecbff"/><stop offset="1" stop-color="#33bfff"/></radialGradient><rect width="8.296" height="8.296" x="12.51" y="22.462" fill="url(#VxYXfMpjN4dLgpTpFrg7Pb)"/><path fill="#754d33" d="M21.252,31.204h-9.187v-9.187h9.187V31.204z M12.956,30.314h7.406v-7.406h-7.406V30.314z"/><rect width=".89" height="8.318" x="16.213" y="22.441" fill="#754d33"/><rect width="8.318" height=".89" x="12.499" y="26.155" fill="#754d33"/><rect width="10.51" height="1.224" x="11.4" y="30.27" fill="#754d33"/><linearGradient id="VxYXfMpjN4dLgpTpFrg7Pc" x1="30.381" x2="30.381" y1="37.604" y2="39.261" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#d1cbc2"/><stop offset=".165" stop-color="#c8c2b9"/><stop offset=".432" stop-color="#b0aba2"/><stop offset=".767" stop-color="#89857c"/><stop offset="1" stop-color="#6a665e"/></linearGradient><rect width="12.031" height="1.224" x="24.365" y="37.993" fill="url(#VxYXfMpjN4dLgpTpFrg7Pc)"/><linearGradient id="VxYXfMpjN4dLgpTpFrg7Pd" x1="30.364" x2="30.364" y1="38.828" y2="40.485" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#d1cbc2"/><stop offset=".165" stop-color="#c8c2b9"/><stop offset=".432" stop-color="#b0aba2"/><stop offset=".767" stop-color="#89857c"/><stop offset="1" stop-color="#6a665e"/></linearGradient><rect width="14.343" height="1.224" x="23.193" y="39.218" fill="url(#VxYXfMpjN4dLgpTpFrg7Pd)"/><linearGradient id="VxYXfMpjN4dLgpTpFrg7Pe" x1="23.971" x2="23.971" y1="39.946" y2="42.055" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#d1cbc2"/><stop offset=".165" stop-color="#c8c2b9"/><stop offset=".432" stop-color="#b0aba2"/><stop offset=".767" stop-color="#89857c"/><stop offset="1" stop-color="#6a665e"/></linearGradient><rect width="32.227" height="1.558" x="7.858" y="40.442" fill="url(#VxYXfMpjN4dLgpTpFrg7Pe)"/><g opacity=".5"><path fill="#7a3d1c" d="M27.1,28.828h2.787v-4.921H27.1V28.828z M27.545,24.353h1.897v4.03h-1.897V24.353z"/><path fill="#7a3d1c" d="M30.91,36.842h2.787V31.92H30.91V36.842z M31.356,32.366h1.897v4.03h-1.897V32.366z"/><path fill="#7a3d1c" d="M27.1,36.842h2.787V31.92H27.1V36.842z M27.545,32.366h1.897v4.03h-1.897V32.366z"/><path fill="#7a3d1c" d="M30.91,23.907v4.921h2.787v-4.921H30.91z M33.252,28.383h-1.897v-4.03h1.897V28.383z"/></g><radialGradient id="VxYXfMpjN4dLgpTpFrg7Pf" cx="33.077" cy="30.375" r=".675" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ff9e00"/><stop offset="1" stop-color="#9e4f00"/></radialGradient><circle cx="33.077" cy="30.374" r=".675" fill="url(#VxYXfMpjN4dLgpTpFrg7Pf)"/><linearGradient id="VxYXfMpjN4dLgpTpFrg7Pg" x1="24" x2="24" y1="6.757" y2="25.404" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#aba59e"/><stop offset=".944" stop-color="#ada7a0"/></linearGradient><polygon fill="url(#VxYXfMpjN4dLgpTpFrg7Pg)" points="9.048,20.956 9.048,23.07 24,11.984 24,11.988 24.003,11.986 24.006,11.988 24.006,11.984 38.953,23.066 38.953,20.956 24,9.986"/><polygon fill="#eb4b1a" points="24.006,6.407 24.003,6.409 24,6.407 4.911,20.351 6.812,23.363 24,10.619 24,10.623 24.003,10.621 24.006,10.623 24.006,10.619 41.194,23.363 43.095,20.351"/><linearGradient id="VxYXfMpjN4dLgpTpFrg7Ph" x1="13.839" x2="13.839" y1="9.016" y2="10.252" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#aba59e"/><stop offset=".944" stop-color="#ada7a0"/></linearGradient><rect width="5.342" height=".913" x="11.167" y="9.307" fill="url(#VxYXfMpjN4dLgpTpFrg7Ph)"/></svg>',
            ],
            [
                "name" => "Car Interior Cleaning",
                "icon" => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100"><path fill="#ee3e54" d="M13 27A2 2 0 1 0 13 31A2 2 0 1 0 13 27Z"/><path fill="#f1bc19" d="M77 12A1 1 0 1 0 77 14A1 1 0 1 0 77 12Z"/><path fill="#fce0a2" d="M50 13A37 37 0 1 0 50 87A37 37 0 1 0 50 13Z"/><path fill="#f1bc19" d="M83 11A4 4 0 1 0 83 19A4 4 0 1 0 83 11Z"/><path fill="#ee3e54" d="M87 22A2 2 0 1 0 87 26A2 2 0 1 0 87 22Z"/><path fill="#fbcd59" d="M81 74A2 2 0 1 0 81 78 2 2 0 1 0 81 74zM15 59A4 4 0 1 0 15 67 4 4 0 1 0 15 59z"/><path fill="#ee3e54" d="M25 85A2 2 0 1 0 25 89A2 2 0 1 0 25 85Z"/><path fill="#fff" d="M18.5 51A2.5 2.5 0 1 0 18.5 56A2.5 2.5 0 1 0 18.5 51Z"/><path fill="#f1bc19" d="M21 66A1 1 0 1 0 21 68A1 1 0 1 0 21 66Z"/><path fill="#fff" d="M80 33A1 1 0 1 0 80 35A1 1 0 1 0 80 33Z"/><path fill="#bebacb" d="M29.562,71.3c-1.027,0-1.862-0.835-1.862-1.862V63.7h6.6v5.737c0,1.027-0.835,1.862-1.862,1.862 H29.562z"/><path fill="#472b29" d="M33.6,64.4v5.037c0,0.641-0.522,1.162-1.163,1.162h-2.875c-0.641,0-1.162-0.521-1.162-1.162V64.4 H33.6 M35,63h-8v6.438C27,70.853,28.147,72,29.562,72h2.875C33.853,72,35,70.853,35,69.438V63L35,63z"/><path fill="#bebacb" d="M68.562,71.3c-1.027,0-1.862-0.835-1.862-1.862V63.7h6.6v5.737c0,1.027-0.835,1.862-1.862,1.862 H68.562z"/><path fill="#472b29" d="M72.6,64.4v5.037c0,0.641-0.522,1.162-1.163,1.162h-2.875c-0.641,0-1.162-0.521-1.162-1.162V64.4 H72.6 M74,63h-8v6.438C66,70.853,67.147,72,68.562,72h2.875C72.853,72,74,70.853,74,69.438V63L74,63z"/><path fill="#ef7d99" d="M25.467,44.5h6.066c1.082,0,1.967-0.885,1.967-1.967v-2.066c0-1.082-0.885-1.967-1.967-1.967h-6.066 c-1.082,0-1.967,0.885-1.967,1.967v2.066C23.5,43.615,24.385,44.5,25.467,44.5z"/><path fill="#472b29" d="M31.533,45.2h-6.065c-1.471,0-2.667-1.196-2.667-2.667v-2.066c0-1.471,1.197-2.667,2.667-2.667 h6.065c1.471,0,2.667,1.196,2.667,2.667v2.066C34.2,44.004,33.003,45.2,31.533,45.2z M25.467,39.2 c-0.699,0-1.267,0.568-1.267,1.267v2.066c0,0.698,0.568,1.267,1.267,1.267h6.065c0.699,0,1.267-0.568,1.267-1.267v-2.066 c0-0.698-0.568-1.267-1.267-1.267H25.467z"/><path fill="#ef7d99" d="M69.467,44.5h6.066c1.082,0,1.967-0.885,1.967-1.967v-2.066c0-1.082-0.885-1.967-1.967-1.967h-6.066 c-1.082,0-1.967,0.885-1.967,1.967v2.066C67.5,43.615,68.385,44.5,69.467,44.5z"/><path fill="#472b29" d="M75.533,45.2h-6.066c-1.471,0-2.667-1.196-2.667-2.667v-2.066c0-1.471,1.196-2.667,2.667-2.667 h6.066c1.471,0,2.667,1.196,2.667,2.667v2.066C78.2,44.004,77.004,45.2,75.533,45.2z M69.467,39.2 c-0.698,0-1.267,0.568-1.267,1.267v2.066c0,0.698,0.568,1.267,1.267,1.267h6.066c0.698,0,1.267-0.568,1.267-1.267v-2.066 c0-0.698-0.568-1.267-1.267-1.267H69.467z"/><path fill="#ef7d99" d="M29.312,65.3c-1.992,0-3.612-1.62-3.612-3.612v-8.375c0.003-0.021,0.019-0.153,0.02-0.175 c0.003-0.069-0.003-0.138-0.02-0.203c0.015-4.303,0.591-5.101,2.662-7.965c0.784-1.085,1.76-2.435,2.978-4.343 c1.041-1.633,1.438-3.714,1.823-5.727c0.84-4.4,1.565-8.2,8.038-8.2h18.598c6.473,0,7.198,3.8,8.038,8.2 c0.385,2.013,0.781,4.094,1.823,5.726c1.218,1.909,2.193,3.259,2.978,4.344c2.073,2.867,2.648,3.662,2.662,7.975 c-0.017,0.064-0.024,0.131-0.021,0.198c0.001,0.02,0.014,0.131,0.017,0.151l0.004,8.394c0,1.992-1.62,3.612-3.612,3.612H29.312z"/><path fill="#472b29" d="M59.799,27.4c5.894,0,6.537,3.368,7.35,7.631c0.397,2.078,0.807,4.226,1.92,5.971 c1.229,1.927,2.212,3.286,3.001,4.378c2.053,2.839,2.512,3.474,2.529,7.484c-0.017,0.101-0.024,0.204-0.019,0.308 c0.003,0.064,0.01,0.126,0.019,0.198v8.317c0,1.606-1.307,2.912-2.913,2.912H29.312c-1.606,0-2.912-1.307-2.912-2.912v-8.317 c0.009-0.066,0.016-0.132,0.019-0.199c0.005-0.1-0.002-0.2-0.019-0.298c0.016-4.019,0.474-4.652,2.529-7.494 c0.789-1.092,1.772-2.451,3.001-4.378c1.114-1.746,1.524-3.894,1.92-5.971c0.814-4.264,1.457-7.631,7.35-7.631H50h1H59.799 M59.799,26H51h-1h-8.799c-10.284,0-7.368,9.417-10.451,14.25C26.212,47.364,25,46.729,25,53.104l0.021-0.001 C25.018,53.174,25,53.241,25,53.313v8.375C25,64.069,26.931,66,29.312,66h42.375C74.069,66,76,64.069,76,61.688v-8.375 c0-0.072-0.018-0.138-0.021-0.209L76,53.104c0-6.375-1.212-5.74-5.75-12.854C67.167,35.417,70.083,26,59.799,26L59.799,26z"/><path fill="#84a7d7" d="M33.613,44.3c-1.36-0.549-3.222-1.3-3.39-1.849c-0.006-0.021-0.026-0.085,0.082-0.245 c0.324-0.48,0.669-1.005,1.036-1.579c1.041-1.633,1.438-3.714,1.823-5.727c0.84-4.4,1.565-8.2,8.038-8.2h18.598 c6.473,0,7.198,3.8,8.038,8.2c0.385,2.013,0.781,4.094,1.823,5.726c0.387,0.606,0.748,1.156,1.088,1.659 c0.041,0.061,0.087,0.144,0.072,0.194c-0.154,0.502-1.932,1.217-3.23,1.738L67.387,44.3H33.613z"/><path fill="#472b29" d="M59.799,27.4c5.894,0,6.537,3.368,7.35,7.631c0.397,2.078,0.807,4.226,1.92,5.971 c0.311,0.488,0.607,0.94,0.889,1.363c-0.551,0.367-1.773,0.859-2.632,1.204L67.251,43.6H33.749 c-0.922-0.372-2.166-0.882-2.691-1.26c0.276-0.414,0.567-0.858,0.873-1.338c1.114-1.746,1.524-3.894,1.92-5.971 c0.814-4.264,1.457-7.631,7.35-7.631H50h1H59.799 M59.799,26H51h-1h-8.799c-10.284,0-7.368,9.417-10.451,14.25 c-0.363,0.569-0.705,1.089-1.026,1.566C28.825,43.151,31,44,33.477,45h34.045c2.477-1,4.681-1.81,3.805-3.108 c-0.336-0.498-0.695-1.042-1.078-1.642C67.167,35.417,70.083,26,59.799,26L59.799,26z"/><g><path fill="#fde751" d="M31.5,56.3c-1.544,0-2.8-1.256-2.8-2.8s1.256-2.8,2.8-2.8h4c1.544,0,2.8,1.256,2.8,2.8 s-1.256,2.8-2.8,2.8H31.5z"/><path fill="#472b29" d="M35.5,51.4c1.158,0,2.1,0.942,2.1,2.1s-0.942,2.1-2.1,2.1h-4c-1.158,0-2.1-0.942-2.1-2.1 s0.942-2.1,2.1-2.1H35.5 M35.5,50h-4c-1.933,0-3.5,1.567-3.5,3.5s1.567,3.5,3.5,3.5h4c1.933,0,3.5-1.567,3.5-3.5 S37.433,50,35.5,50L35.5,50z"/></g><g><path fill="#fde751" d="M65.5,56.3c-1.544,0-2.8-1.256-2.8-2.8s1.256-2.8,2.8-2.8h4c1.544,0,2.8,1.256,2.8,2.8 s-1.256,2.8-2.8,2.8H65.5z"/><path fill="#472b29" d="M69.5,51.4c1.158,0,2.1,0.942,2.1,2.1s-0.942,2.1-2.1,2.1h-4c-1.158,0-2.1-0.942-2.1-2.1 s0.942-2.1,2.1-2.1H69.5 M69.5,50h-4c-1.933,0-3.5,1.567-3.5,3.5s1.567,3.5,3.5,3.5h4c1.933,0,3.5-1.567,3.5-3.5 S71.433,50,69.5,50L69.5,50z"/></g><g><path fill="#472b29" d="M75.5,61h-18c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h18c0.276,0,0.5,0.224,0.5,0.5 S75.776,61,75.5,61z"/></g><g><path fill="#472b29" d="M44.5,61h-14c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h14c0.276,0,0.5,0.224,0.5,0.5 S44.776,61,44.5,61z"/></g><g><path fill="#472b29" d="M44.5,41h-10c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h10c0.276,0,0.5,0.224,0.5,0.5 S44.776,41,44.5,41z"/></g><g><path fill="#472b29" d="M51.5,41h-4c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h4c0.276,0,0.5,0.224,0.5,0.5 S51.776,41,51.5,41z"/></g><g><path fill="#472b29" d="M53.5,61h-5c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h5c0.276,0,0.5,0.224,0.5,0.5 S53.776,61,53.5,61z"/></g><g><path fill="#472b29" d="M44.5,57c-0.276,0-0.5-0.224-0.5-0.5v-5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v5 C45,56.776,44.776,57,44.5,57z"/></g><g><path fill="#472b29" d="M41.5,57c-0.276,0-0.5-0.224-0.5-0.5v-5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v5 C42,56.776,41.776,57,41.5,57z"/></g><g><path fill="#472b29" d="M47.5,57c-0.276,0-0.5-0.224-0.5-0.5v-5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v5 C48,56.776,47.776,57,47.5,57z"/></g><g><path fill="#472b29" d="M50.5,57c-0.276,0-0.5-0.224-0.5-0.5v-5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v5 C51,56.776,50.776,57,50.5,57z"/></g><g><path fill="#472b29" d="M53.5,57c-0.276,0-0.5-0.224-0.5-0.5v-5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v5 C54,56.776,53.776,57,53.5,57z"/></g><g><path fill="#472b29" d="M56.5,57c-0.276,0-0.5-0.224-0.5-0.5v-5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v5 C57,56.776,56.776,57,56.5,57z"/></g><g><path fill="#472b29" d="M59.5,57c-0.276,0-0.5-0.224-0.5-0.5v-5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v5 C60,56.776,59.776,57,59.5,57z"/></g><g><path fill="#472b29" d="M66.7,44h-1.4c0-2.923-2.377-5.3-5.3-5.3s-5.3,2.377-5.3,5.3h-1.4c0-3.694,3.006-6.7,6.7-6.7 S66.7,40.306,66.7,44z"/></g><g><path fill="#ef7d99" d="M53,32.5h-4c-0.825,0-1.5-0.675-1.5-1.5v0c0-0.825,0.675-1.5,1.5-1.5h4c0.825,0,1.5,0.675,1.5,1.5v0 C54.5,31.825,53.825,32.5,53,32.5z"/><path fill="#472b29" d="M53,33.2h-4c-1.213,0-2.2-0.987-2.2-2.2s0.987-2.2,2.2-2.2h4c1.213,0,2.2,0.987,2.2,2.2 S54.213,33.2,53,33.2z M49,30.2c-0.441,0-0.8,0.358-0.8,0.8s0.359,0.8,0.8,0.8h4c0.441,0,0.8-0.358,0.8-0.8s-0.358-0.8-0.8-0.8H49z"/></g></svg>',
            ],
            [
                "name" => "Upholstery Cleaning",
                "icon" => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 30 30" fill="#5B150C">
                <path d="M15 3C13.225 3 11.635109 3.775 10.537109 5L8 5C5.239 5 3 7.239 3 10L3 11C5.209 11 7 12.791 7 15L7 17L23 17L23 15C23 12.791 24.791 11 27 11L27 10C27 7.239 24.761 5 22 5L19.462891 5C18.364891 3.775 16.775 3 15 3 z M 15 8C15.552 8 16 8.448 16 9C16 9.552 15.552 10 15 10C14.448 10 14 9.552 14 9C14 8.448 14.448 8 15 8 z M 9 9C9.552 9 10 9.448 10 10C10 10.552 9.552 11 9 11C8.448 11 8 10.552 8 10C8 9.448 8.448 9 9 9 z M 21 9C21.552 9 22 9.448 22 10C22 10.552 21.552 11 21 11C20.448 11 20 10.552 20 10C20 9.448 20.448 9 21 9 z M 2 13C0.895 13 0 13.895 0 15C0 15.738946 0.40436594 16.376387 1 16.722656L1 24L1 25 A 1.0001 1.0001 0 1 0 3 25L3 24L27 24L27 25 A 1.0001 1.0001 0 1 0 29 25L29 21L29 16.722656C29.595634 16.376387 30 15.738946 30 15C30 13.895 29.105 13 28 13L27 13C25.895 13 25 13.895 25 15L25 19L5 19L5 15C5 13.895 4.105 13 3 13L2 13 z" fill="#5B150C" />
              </svg>',
            ],
        ]));

        $siteInfo = SiteSettings::first();

        return view('welcome', compact('services', 'siteInfo'));
    }

    public function dashboard()
    {
        LSCache::purgeAll();

        return view('dashboard');
    }

    public function notFound()
    {
        return view('notfound');
    }
}