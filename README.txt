ชื่อโครงงาน : เว็บไซต์สำหรับรีวิวภาพยนตร์

ชื่อผู้จัดทำ 
นางสาวเมธาวี  จันทร  5709611585
นายยศพล เจียรมณีทวีสิน  5709680051

+ จะต้องมี webpage ไม่น้อยกว่า 5 page ที่ผู้ใช้สามารถ navigate ได้ภายใน website
1.Home page
2.Category page 
3.Detail page 
4.Login page
5.Profile page
6.Register page
7.Edit profile page 

+ การใช้้ css ในการจัดรูปแบบหน้า page โดยจะต้องมีรูปแบบที่ต่างกันอย่างน้อย 3 แบบ
แบบที่ 1 แบบ Inline Style Sheet เช่น <span id="rating" style="font-size : 30px;"><span style="color: blue;"> ในบรรทัดที่ 199 file : detail.php
แบบที่ 2 แบบ Embed Style Sheet คือการมี tag <style> ใน php file เช่นใน detail.php category.php edit.php profile.php และ index.php
แบบที่ 3 แบบ External Style Sheet มีในทุก php file คือการเรียกใช้ไฟล์ .css ผ่าน <link>

+ การใช้ form && form validation 
มีการใช้ form ในไฟล์ register.php และ login.php เพื่อตรวจสอบข้อมูลของผู้ใช้ และเพื่อตรวจสอบสถานะว่าเป็น get / post 

+ การใช้ php สำหรับ cookie/session 
มีการใช้ session ในทุกไฟล์ php  เช่น การเรียกใช้  session_start(); และใช้ session เพื่อจัดเก็บข้อมูล 
นอกจากนี้ยังมี การใช้  session_destroy(); ในไฟล์ logput.php เพื่อให้เป็นการ clear session ของระบบออกให้หมด

+ การใช้ file ทางฝั่ง server  หรือ การติดต่อกับ Database เพื่อสร้าง dynamic content
ไฟล์ category.php และ detail.php เป็น dynamic content เพราะ page จะถูกสร้างจากข้อมูลที่่มีในฐานข้อมูลผ่านไฟล์เดียวแทนการสร้างหลายๆไฟล์

+ การใช้ javascript ที่แสดงให้เห็นถึงหลักการของ DOM และ การทำงานแบบ event-driven
การใช้ onsubmit เข้ามาช่วยในการ login และ register เพื่อตรวจสอบข้อมูลของผู้ใช้ว่ามีอยู่แล้วในฐานข้อมูลหรือไม่
และตรวจสอบความถูกต้องรูปแบบของข้อมูลที่ผู้ใช้กรอกเข้ามา