#!/usr/bin/env python
# -*- coding:utf-8 -*-
import hashlib
import random

# 随机选一条数据
# SELECT * FROM Bar B JOIN (SELECT CEIL(MAX(ID)*RAND()) AS ID FROM Bar) AS m ON B.ID >= m.ID LIMIT 1;
f = open('init.sql', 'w')

userNum = 1000
phone   = 13888888888
email   = 'jutianxia@duapp.com'
address = u"北京市朝阳区"
period  = u"05/01/2014 - 05/07/2014"
x       = 116.394711
y       = 39.913288
introduction = u"简介"
logo    = 'test.jpg'
category = (u"家居卖场", u"家装公司", u"家具", u"地板", u"陶瓷", u"门", u"卫浴洁具", u"厨房设备", u"油漆涂料", u"照明", u"家纺")
alltype = ('Activity', 'Goods', 'Merchant')

# init User
for i in xrange(userNum):
    username = "test%d" % i
    password = hashlib.md5(username).hexdigest()
    nickname = username
    role     = i % 3
    status   = 0
    f.writelines("insert into User(username,password,role,status,nickname,email,phone) values('%s','%s', %d, %d,'%s','%s','%s');\n" % (username,password,role,status,nickname,email,phone))
    # Merchant
    if role == 1:
        merchantName = "Merchant_%d" % i
        category_tmp = random.choice(category)
        #userId = '(select id from User where username = \"%s\")' % username
        sql = u"insert into Merchant(userId,name,phone,address,coordinate,introduction,logo,category,promotionExpenses, level)\
               values(%s, '%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, %d);\n" % ('(select id from User where username = \"%s\")' % username, merchantName, phone, address, 
                '%f,%f' % (x+random.uniform(-1, 1) * random.randint(1, 50) * 0.01, y+random.uniform(-1, 1) * random.randint(1, 50) * 0.01),
                introduction, 
                logo, 
                category_tmp, 
                int(i), 
                random.randint(0,2))
        f.writelines(sql.encode('utf-8'))
        # Activity
        activityName = "Activity_%d" % i
        price     = random.randint(1, 10000)
        sql = u"insert into Activity(merchantId,name,introduction,address,period,phone,category,promotionExpenses)\
              values(%s, '%s', '%s', '%s', '%s', '%s', '%s', %d);\n" \
              % ('(select id from Merchant where name = \"%s\")' % merchantName, 
                  activityName, introduction, address, period, phone, category_tmp, int(i))
        f.writelines(sql.encode('utf-8'))
        # Goods
        for j in xrange(9):
            goodsName = "Goods_%d" % j
            price     = random.randint(1, 10000)
            promotionPrice = random.randint(1, price)
            sql = u"insert into Goods(merchantId,name,introduction,price,promotionPrice,category)\
                  values(%s, '%s', '%s', %f, %f, '%s');\n" \
                  % ('(select id from Merchant where name = \"%s\")' % merchantName, 
                      goodsName, introduction, price, promotionPrice, random.choice(category))
            f.writelines(sql.encode('utf-8'))

# JoinActivity and OrderGoods and Favorite
for x in xrange(userNum-3):
    username = "test%d" % x
    role     = x % 3
    # Comment
    # Normal User
    if role == 2:
        activityId = random.randint(1, (userNum-10)/3)
        houseArea  = random.randint(1, 200)
        for y in xrange(5):
            #JoinActivity
            sql = u"insert into JoinActivity(activityId,userId,name,phone,address,houseArea,status)\
                  values(%d, %s, '%s', '%s', '%s', %d, 0);\n" \
                  % (activityId + y, '(select id from User where username = \"%s\")' % username,
                     username, phone, address, houseArea)
            f.writelines(sql.encode('utf-8'))
            #OrderGoods
            sql = u"insert into OrderGoods(goodsId,userId,name,phone,address,houseArea,status)\
                  values(%d, %s, '%s', '%s', '%s', %d, 0);\n" \
                  % (activityId + y, '(select id from User where username = \"%s\")' % username,
                     username, phone, address, houseArea)
            f.writelines(sql.encode('utf-8'))
            #Favorite
            sql = u"insert into Favorite(userId,type,foreignKey)\
              values(%s, '%s', %s);\n" \
              % ('(select id from User where username = \"%s\")' % username, random.choice(alltype), random.randint(1, 300))
            f.writelines(sql.encode('utf-8'))


# RankList
merchantId = 1
for c in category:
    for t in (u"搜索排行", u"口碑排行"):
        for i in xrange(10):
            sql = u"insert into RankList(type,category,rank,merchantId) values('%s','%s',%d,%d);\n" % (t, c, i+1,merchantId)
            f.writelines(sql.encode('utf-8'))
            #merchantId += 1




f.close()

