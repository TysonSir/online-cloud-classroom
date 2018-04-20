#学院表
create table tu_college (
  clg_id int unsigned not null auto_increment primary key,
  clg_name varchar(50) not null default '' COMMENT '学院名'
) engine myisam charset utf8;

#专业表
create table tu_major (
  mg_id int unsigned not null auto_increment primary key,
  mg_name varchar(50) not null default '' COMMENT '专业名',
  clg_id int unsigned not null default 0 COMMENT '学院id'
) engine myisam charset utf8;


#学生表
create table tu_student (
  stu_id int unsigned not null auto_increment primary key,
  stu_name varchar(50) not null default '' COMMENT '学生名',
  stu_password char(255) not null default '' COMMENT '密码',
  stu_grade char(4) not null default '' COMMENT '年级',
  stu_code char(12) not null default '' COMMENT '学号',
  stu_image varchar(100) not null default 0 COMMENT '头像',
  stu_sex varchar(2) NOT NULL DEFAULT '' COMMENT '性别',
  stu_phone varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  stu_email varchar(30) not null default '' COMMENT '邮箱',
  stu_order tinyint unsigned not null default 0 COMMENT '排序',
  mg_id int unsigned not null default 0 COMMENT '专业id',
  clg_id int unsigned not null default 0 COMMENT '学院id'
) engine myisam charset utf8;


#教师表
create table tu_teacher (
  tea_id int unsigned not null auto_increment primary key,
  tea_name varchar(50) not null default '' COMMENT '用户名',
  tea_password char(255) not null default '' COMMENT '密码',
  tea_college varchar(30) not null default '' COMMENT '所属学院',
  tea_description varchar(255) not null default '' COMMENT '描述',
  tea_sex varchar(2) NOT NULL DEFAULT '' COMMENT '性别',
  tea_phone varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  tea_email varchar(30) not null default '' COMMENT '邮箱',
  tea_professional varchar(30) not null default '' COMMENT '职称',
  tea_order tinyint unsigned not null default 0 COMMENT '排序',
  mg_id int unsigned not null default 0 COMMENT '专业id',
  clg_id int unsigned not null default 0 COMMENT '学院id'
) engine myisam charset utf8;

#课程分类表
create table tu_coursecategory (
  ccg_id int unsigned not null auto_increment primary key,
  ccg_name varchar(50) not null default '' COMMENT '分类名',
  ccg_pid int unsigned not null default 0 COMMENT '父级id'
) engine myisam charset utf8;

#课程表
create table tu_course (
  cour_id int unsigned not null auto_increment primary key,
  cour_name varchar(50) not null default '' COMMENT '课程名称',
  cour_teacher char(50) not null default '' COMMENT '任课教师',
  cour_title char(255) not null default '' COMMENT '简介',
  cour_description varchar(255) not null default '' COMMENT '描述',
  cour_image varchar(100) not null default 0 COMMENT '缩略图',
  cour_order tinyint unsigned not null default 0 COMMENT '排序',
  cour_time int unsigned not null default 0 COMMENT '上线时间',
  cour_isdelete tinyint unsigned not null default 0 COMMENT '是否删除',
  tea_id int unsigned not null default 0 COMMENT '教师id',
  cate_id int unsigned not null default 0 COMMENT '父级分类id'
) engine myisam charset utf8;


#任务表
create table tu_task(
  task_id int unsigned not null auto_increment primary key,
  task_name varchar(50) not null default '' COMMENT '作业名称',
  task_description varchar(255) not null default '' COMMENT '描述',
  task_file varchar(100) not null default '' COMMENT '文件',
  task_order tinyint unsigned not null default 0 COMMENT '排序',
  task_addtime int unsigned not null default 0 COMMENT '上线时间',
  task_finaltime int unsigned not null default 0 COMMENT '最晚提交时间',
  task_state tinyint unsigned not null default 0 COMMENT '状态',
  cour_id int unsigned not null default 0 COMMENT '课程id'
) engine myisam charset utf8;


#作业表
create table tu_homework(
  hw_id int unsigned not null auto_increment primary key,
  hw_name varchar(50) not null default '' COMMENT '作业名称',
  cour_name varchar(50) not null default '' COMMENT '课程名称',
  hw_description varchar(255) not null default '' COMMENT '描述',
  hw_file varchar(100) not null default '' COMMENT '文件',
  hw_comment varchar(200) not null default '' COMMENT '评语',
  hw_score tinyint not null default 0 COMMENT '分数',
  hw_order tinyint unsigned not null default 0 COMMENT '排序',
  hw_addtime int unsigned not null default 0 COMMENT '上线时间',
  hw_state tinyint unsigned not null default 0 COMMENT '状态',
  task_id int unsigned not null default 0 COMMENT '任务id',
  stu_id int unsigned not null default 0 COMMENT '学生id'
) engine myisam charset utf8;


#讨论表
create table tu_talk(
  talk_id int unsigned not null auto_increment primary key,
  talk_title varchar(50) not null default '' COMMENT '作业名称',
  talk_content varchar(255) not null default '' COMMENT '描述',
  talk_addtime int unsigned not null default 0 COMMENT '上线时间',
  talk_state tinyint unsigned not null default 0 COMMENT '状态',
  cour_id int unsigned not null default 0 COMMENT '课程id',
  stu_id int unsigned not null default 0 COMMENT '学生id'
) engine myisam charset utf8;

#课程资料文件
create table tu_courfile(
  cf_id int unsigned not null auto_increment primary key,
  cf_name varchar(50) not null default '' COMMENT '文件名',
  cf_url varchar(255) not null default '' COMMENT '文件路径',
  cf_addtime int unsigned not null default 0 COMMENT '上线时间',
  cf_order tinyint unsigned not null default 0 COMMENT '排序',
  cf_isdelete tinyint unsigned not null default 0 COMMENT '是否删除',
  cf_view int unsigned not null default 0 COMMENT '下载量',
  cour_id int unsigned not null default 0 COMMENT '课程id'
) engine myisam charset utf8;

#课程视频
create table tu_courvideo(
  cv_id int unsigned not null auto_increment primary key,
  cv_name varchar(50) not null default '' COMMENT '视频名',
  cv_url varchar(255) not null default '' COMMENT '视频路径',
  cv_addtime int unsigned not null default 0 COMMENT '上线时间',
  cv_order tinyint unsigned not null default 0 COMMENT '排序',
  cv_isdelete tinyint unsigned not null default 0 COMMENT '是否删除',
  cv_view int unsigned not null default 0 COMMENT '下载量',
  cour_id int unsigned not null default 0 COMMENT '课程id'
) engine myisam charset utf8;




#寻物启事

#新鲜事

#课后讨论

