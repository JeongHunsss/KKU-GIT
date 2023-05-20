# DB_Term_Project (KKU-GIT)
건국대 글로컬 데이터베이스 텀프로젝트
-----------------------------------------------------------------
사용서버: apache

사용 DB: MYSQL

php버전: 8

DB, SMTP 설정파일 설정할 것

SMTP 설정 시 사용할 서버의 비밀번호 발급 받아야함

네이버 SMTP 설정법
1. 네이버 로그인 후 메일의 환경설정 클릭
2. POP3/IMAP 설정 클릭
3. POP3/SMTP 설정 탭의 사용함 클릭 후 저장
4. 네이버 홈페이지 로그인 탭의 자물쇠 아이콘 클릭
5. 2단계 인증 관리 클릭
6. 애플리케이션 비밀번호 생성 후 비밀번호 확인
7. mailerconfig.php 파일에서  
    $mail->Host = 'smtp.naver.com'                              
    $mail->Username   = '본인네이버아이디@naver.com'
    
    $mail->Password   = '발급 받은 비밀번호'                                    
    $mail->setFrom('본인네이버아이디@naver.com(Username과 동일)', 'KKU-GIT')
